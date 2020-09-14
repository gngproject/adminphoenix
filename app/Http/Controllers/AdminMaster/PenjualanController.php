<?php

namespace App\Http\Controllers\AdminMaster;

use DataTables;
use App\product;
use App\transaction_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;


class PenjualanController extends Controller
{
    // private $__client;

    //  public function __construct() {
    //       $this->_client = new Client([
    //            'base_uri' => 'http://localhost:8000/api/',
    //            'headers'  => [
    //                           'API_KEY'      =>'6c1f8962d43c0a2496ef99c365de68a8',
    //                           'Content-Type' =>'application/x-www-form-urlencoded',
    //                           'Accept'       =>'application/json'
    //                           ]
    //       ]);
    //  }


    public function index()
    {
        return view('AdminMaster.Sell');
    }

    public function PenjualanDataMaster()
    {
        $Penjualans = DB::table('transaction_detail')
            ->join('product','transaction_detail.ProductID','=',"product.productID")
            ->join('users_table','transaction_detail.userID','=',"users_table.id")
            ->select('transaction_detail.*', 'users_table.name', 'product.Product_Name', 'product.quantity')
            ->where('transaction_detail.TransactionID')
            ->get();

        return datatables()->of($Penjualans)
        ->addColumn('status', 'AdminMaster.template.label')
        ->addIndexColumn()
        ->toJson();
    }

    public function detail($id_payment)
    {
        $request       = $this->_client->request('GET',"pengiriman/{$id_payment}");
        $result        = json_decode($request->getBody()->getContents());
        return view("AdminMaster.SellDetail",['result' => $result]);
    }

    // public function trash()
    // {
    //     $request  = $this->_client->request('GET','transaction/trash');
    //     $response = $request->getBody()->getContents();
    //     $responses = json_decode($response);//jadi data array
    //     return view('AdminMaster.SellTrash',['t'=> $responses]);
    //     // dd($response);
    // }

    // public function TransDeleteSoft($id_payment)
    // {
    //     $request      = $this->_client->request('DELETE',"transaction/delete/{$id_payment}");
    //     $response     = json_decode($request->getBody()->getContents());
    //     return redirect("/admin_master/Sell/show")->with(['success' => 'Delete Has Been Success !']);
    //     // dd($response);
    // }

    // public function RestoreVoucher($voucherid)
    // {
    //     $request    = $this->_client->request('GET',"restore/voucher/{$voucherid}");
    //     $response   = $request->getBody()->getContents();
    //     $responses  = json_decode($response);//jadi data array
    //     // var_dump($responses);
    //     return redirect("/admin_master/VoucherShow")->with(['success' => 'restore Has Been Success !']);
    // }

    // public function DeletePermanent($voucherid)
    // {
    //     $request  = $this->_client->request('GET',"voucher/deletepermanent/{$voucherid}");
    //     $response = $request->getBody()->getContents();
    //     $responses = json_decode($response);//jadi data array
    //     // dd($responses);
    //     return redirect("/admin_master/VoucherTrash")->with(['success' => 'Delete Permanent Has Been Success !']);
    // }

}
