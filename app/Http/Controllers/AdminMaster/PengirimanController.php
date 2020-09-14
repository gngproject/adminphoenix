<?php

namespace App\Http\Controllers\AdminMaster;

use DataTables;
use App\pengiriman;
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
        $pengiriman = DB::table('transaction_detail')->where('status','success')->get();
        return datatables()->of($pengiriman)
        ->addColumn('action', 'AdminMaster.template.action_pengirim')
        ->addColumn('status', 'AdminMaster.template.label_pengirim')
        ->addIndexColumn()
        ->rawColumns(['action','status'])
        // ->rawColumns(['status'])
        ->toJson();
    }

    public function pengiriman_detail($transactionID)
    {
        $result = \DB::table('transaction_detail')
                  ->join('product','transaction_detail.productID','=',"product.productID")
                  ->join('users_table','transaction_detail.userID','=',"users_table.id")
                  ->join('pengiriman','transaction_detail.pengirimanID',"=",'pengiriman.id')
                  ->select('transaction_detail.*', 'users_table.name', 'product.Product_Name', 'product.quantity', 'product.price', 'pengiriman.no_resi', 'pengiriman.status_kirim')
                  ->where('transaction_detail.TransactionID', $transactionID)->get();
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
            'status_kirim'      => 3,
        ]);

        $order2 = transaction_detail::update(['pengirimanID' => $request->id]);

        if(empty($order))
        {
            return response()->json(['message' => 'error'],500);
            } else {
            return redirect(route('adminmaster.pengirim.detail'))->with(['success' => 'Number Resi has been successfully !']);
        }

    }


}
