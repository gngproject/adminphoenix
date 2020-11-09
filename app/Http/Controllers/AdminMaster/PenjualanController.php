<?php

namespace App\Http\Controllers\AdminMaster;

use DataTables;
use App\product;
use App\pengiriman;
use App\transaction_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;


class PenjualanController extends Controller
{
    
    public function index()
    {
        return view('AdminMaster.Sell');
    }

    public function PenjualanDataMaster()
    {
        $Penjualans = DB::table('orders')
                      ->join('product','product.productID', '=', 'orders.ProductID')
                      ->select('orders.*','product.*')->get();
        
        return datatables()->of($Penjualans)
            ->addColumn('status', 'AdminMaster.template.label_order')
            ->addColumn('action', 'AdminMaster.template.action_order')
            ->addIndexColumn()
            ->rawColumns(['status', 'action'])
            ->toJson();
    }
    
    public function status_order($id)
    {
        
        $data_order = \DB::table('orders')->where('code', $id)->first();
        $status_sekarang = $data_order->payment_status;
        $dt = date('Y-m-d H:i:s');;
        if ($status_sekarang == 'pending') {
            \DB::table('orders')->where('code', $id)->update([
                'payment_status' => 'paid'
            ]);
        }
        
             \DB::table('pengiriman')->insert([
            'TransactionID'     => $data_order->code,
            'userID'            => $data_order->user_id,
            'productID'         => $data_order->ProductID,
            'shipmentcode'      => 'Shipment-' . uniqid(),
            'status_kirim'      => 3,
            'created_at'        => $dt
            ]);
        
       
        return redirect()->route('adminmaster.penjualan.show')->with(['success' => 'The Transaction Has Done and Sent to Shipment']);
    }

}