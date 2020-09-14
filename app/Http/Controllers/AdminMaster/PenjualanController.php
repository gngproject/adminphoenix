<?php

namespace App\Http\Controllers\AdminMaster;

use DataTables;
use App\product;
use App\midpayment;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;

class PenjualanController extends Controller
{
    private $__client;

     public function __construct() {
          $this->_client = new Client([
               'base_uri' => 'http://localhost:8000/api/',
               'headers'  => [
                              'API_KEY'      =>'6c1f8962d43c0a2496ef99c365de68a8',
                              'Content-Type' =>'application/x-www-form-urlencoded',
                              'Accept'       =>'application/json'
                              ]
          ]);
     }


    public function index()
    {
        return view('AdminMaster.Sell');
    }

    public function PenjualanDataMaster($id_payment)
    {
        $Penjualans = DB::table('transaction_detail')
            ->join('product','midpayments.productID','=',"product.productID")
            ->join('users_table','midpayments.userID','=',"users_table.id")
            ->where('midpayments.id','=',$id_payment)
            ->get();

        return datatables()->of($Penjualans)
        ->addColumn('actionvoucher', 'AdminMaster.template.action_voucher')
        ->addColumn('status', 'AdminMaster.template.label')
        ->addIndexColumn()
        ->rawColumns(['actionvoucher','status'])
        ->toJson();
    }

    public function detail($id_payment)
    {
        $request       = $this->_client->request('GET',"pengiriman/{$id_payment}");
        $result        = json_decode($request->getBody()->getContents());
        return view("AdminMaster.SellDetail",['result' => $result]);
    }

    public function trash()
    {
        $request  = $this->_client->request('GET','transaction/trash');
        $response = $request->getBody()->getContents();
        $responses = json_decode($response);//jadi data array
        return view('AdminMaster.SellTrash',['t'=> $responses]);
        // dd($response);
    }

    public function TransDeleteSoft($id_payment)
    {
        $request      = $this->_client->request('DELETE',"transaction/delete/{$id_payment}");
        $response     = json_decode($request->getBody()->getContents());
        return redirect("/admin_master/Sell/show")->with(['success' => 'Delete Has Been Success !']);
        // dd($response);
    }

    public function RestoreVoucher($voucherid)
    {
        $request    = $this->_client->request('GET',"restore/voucher/{$voucherid}");
        $response   = $request->getBody()->getContents();
        $responses  = json_decode($response);//jadi data array
        // var_dump($responses);
        return redirect("/admin_master/VoucherShow")->with(['success' => 'restore Has Been Success !']);
    }

    public function DeletePermanent($voucherid)
    {
        $request  = $this->_client->request('GET',"voucher/deletepermanent/{$voucherid}");
        $response = $request->getBody()->getContents();
        $responses = json_decode($response);//jadi data array
        // dd($responses);
        return redirect("/admin_master/VoucherTrash")->with(['success' => 'Delete Permanent Has Been Success !']);
    }

}
