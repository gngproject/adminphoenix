<?php

namespace App\Http\Controllers\AdminMaster;


use DataTables;
use App\pengiriman;
use App\users_table;
use App\transaction_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class PengirimanController extends Controller
{

    public function index()
    {
        return view('AdminMaster.PengirimanProducts');
    }

    public function pengiriman_data()
    {
        $pengiriman = DB::table('pengiriman')->where('status_kirim','=',3)->get();
        return datatables()->of($pengiriman)
        ->addColumn('action', 'AdminMaster.template.action_pengirim')
        ->addColumn('status', 'AdminMaster.template.label_pengirim')
        ->addIndexColumn()
        ->rawColumns(['action','status'])
        // ->rawColumns(['status'])
        ->toJson();
    }

    public function inputnumbershipping($TransactionID)
    {
        $result = \DB::table('transaction_detail')
                  ->join('product','transaction_detail.productID','=',"product.productID")
                  ->join('users','transaction_detail.userID','=',"users.id")
                  ->select('transaction_detail.*', 'product.*', 'users.*')
                  ->where('transaction_detail.TransactionID','=',$TransactionID)->get();
       return view('AdminMaster.ViewPengiriman', ['result'=> $result]);
    //    dd($result);
    }

    public function ShippingOrder(Request $request)
    {
        $order = pengiriman::where('TransactionID', $request->TransactionID)
        ->create([
            'TransactionID'     => $request->TransactionID,
            'userID'            => $request->userID,
            'ProductID'         => $request->ProductID,
            'no_resi'           => $request->no_resi,
            'shipmentcode'      => 'Shipment-' . uniqid(),
            'status_kirim'      => 3,
        ]);

        if(empty($order))
        {
            return response()->json(['message' => 'error'],500);
            } else {
            return redirect(route('adminmaster.pengiriman.show'))->with(['success' => 'Truck Number has been successfully !']);
        }

    }

    public function statuspengiriman($id)
    {
          $status_pengiriman = \DB::table('pengiriman')->where('id', $id)->first();
          $status_sekarang = $status_pengiriman->status;

            if ($status_sekarang == 0) {
               \DB::table('pengiriman')->where('id', $id)->update([
                    'status' => 1
            ]);
        }
            else if($status_sekarang == 1){
               \DB::table('pengiriman')->where('id', $id)->update([
                    'status' => 2
            ]);
        }
            else if($status_sekarang == 2){
                \DB::table('pengiriman')->where('id', $id)->update([
                 'status' => 3
            ]);
        }
            else {
                \DB::table('pengiriman')->where('id', $id)->update([
                    'status' => 0
            ]);
        }
        return redirect()->route('adminmaster.pengiriman.show')->with(['success' => 'status has been changed!']);
    }

    public function pengirimandetail($TransactionID)
    {
        $result = \DB::table('pengiriman')
                  ->join('product','pengiriman.productID','=',"product.productID")
                  ->join('users','pengiriman.userID','=',"users.id")
                  ->join('transaction_detail','pengiriman.TransactionID','=',"pengiriman.TransactionID")
                  ->select('pengiriman.*', 'product.*', 'users.*', 'transaction_detail.*')
                  ->where('pengiriman.TransactionID','=',$TransactionID)->get();
       return view('AdminMaster.PengirimanDetail', ['model'=> $result]);
    }


}