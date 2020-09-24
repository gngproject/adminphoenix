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
        $Penjualans = DB::table('transaction_detail')->get();
        return datatables()->of($Penjualans)
            ->addColumn('status', 'AdminMaster.template.label_order')
            ->addColumn('action', 'AdminMaster.template.action_transaction')
            ->addIndexColumn()
            ->rawColumns(['status','action'])
            ->toJson();
    }

    public function status_order($id)
    {
        $status_order = \DB::table('transaction_detail')->where('TransactionID', $id)->first();
        
        $status_sekarang = $status_order->status;
        
        if ($status_sekarang == 'pending') {
            \DB::table('transaction_detail')->where('TransactionID', $id)->update([
                'status' => 'shipping'
            ]);
        }
        else if($status_sekarang == 'shipping'){
            \DB::table('transaction_detail')->where('TransactionID', $id)->update([
                'status' => 'success'
            ]);
        }
       
        return redirect()->route('adminmaster.penjualan.show')->with(['success' => 'status has been changed!']);
    }

}