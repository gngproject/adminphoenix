<?php

namespace App\Http\Controllers\AdminMaster;

use DataTables;
use App\voucher;
use GuzzleHttp\Client;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;

class VoucherController extends Controller
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
        return view("AdminMaster.Vouchers");
    }

    public function VoucherDataMaster()
    {
        $vouchers = voucher::where('status','=',1)->get();

        return datatables()->of($vouchers)
        ->addColumn('actionvoucher', 'AdminMaster.template.action_voucher')
        ->addColumn('status', 'AdminMaster.template.label')
        ->addIndexColumn()
        ->rawColumns(['actionvoucher','status'])
        ->toJson();
    }

    public function IndexNonActive()
    {
        return view("AdminMaster.VoucherTrash");
    }

    public function NonActiveVoucherMaster()
    {
        $vouchers = voucher::where('status','=',0)->get();

        return datatables()->of($vouchers)
        ->addColumn('actionvoucher', 'AdminMaster.template.action_voucher')
        ->addColumn('status', 'AdminMaster.template.label')
        ->addIndexColumn()
        ->rawColumns(['actionvoucher','status'])
        ->toJson();
    }

    public function VcrDelete($voucherid) {
        $request      = $this->_client->request('DELETE',"voucher/delete/{$voucherid}");
        $response     = json_decode($request->getBody()->getContents());
        return redirect("/admin_master/VoucherShow")->with(['success' => 'Delete Has Been Success !']);
        // dd($response);
    }

    // public function ShowTrash() {
    //     $request    = voucher::where('status','=',0)->get();
    //     return view('AdminMaster.VoucherTrash',['Trashers'=> $request]);
    //     // $request  = $this->_client->request('GET','voucher/trash');
    //     // $response = $request->getBody()->getContents();
    //     // $responses = json_decode($response);//jadi data array
    //     // return view('AdminMaster.VoucherTrash',['Trashers'=> $responses]);
    //     // dd($response);
    // }

    public function VoucherAdd(Request $req) {
        $response = $this->_client->request('POST','voucher/add_vouch',
        [
            'json' =>[
                 'voucherID_view'               => $req->get("voucherID_view"),
                 'voucherCode'                  => $req->get("voucherCode"),
                 'type'                         => $req->get("type"),
                 'voucherPercent'               => $req->get("voucherPercent"),
                 'voucherDiscount'              => $req->get("voucherDiscount"),
                 'voucherMax_user'              => $req->get("voucherMax_user"),
            ]
       ]);

        return redirect("/admin_master/VoucherAddView")->with(['success' => 'Your Voucher Has Been Success !']);
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

    public function EditVoucher($voucherid)
    {
        $response      = $this->_client->request('GET',"voucher/detail/{$voucherid}");
        $result        = json_decode($response->getBody()->getContents());
        $data          = ['response'=> $result];
        return view("AdminMaster.VoucherEdit", $data);
    }

    public function UpdateVoucher(Request $request, $voucherid)
    {
        $response = $this->_client->request("POST","voucherupdate/{$voucherid}",
        [
            "form_params" =>[
                      'voucherID'       => $request->get("voucherID"),
                      'voucherID_view'  => $request->get("voucherID_view"),
                      'voucherCode'     => $request->get("voucherCode"),
                      'type'            => $request->get("type"),
                      'voucherPercent'  => $request->get("voucherPercent"),
                      'voucherDiscount' => $request->get("voucherDiscount"),
                      'voucherMax_user' => $request->get("voucherMax_user"),
            ],

            ]);

        $result = $response->getStatusCode();
        return redirect("/admin_master/VoucherShow")->with(['success' => 'Voucher has been edited successfully !']);
    }

    public function status($id_voucher)
    {
        $status_voucher = \DB::table('voucher')->where('voucherID',$id_voucher)->first();
        $status_sekarang = $status_voucher->status;
            if($status_sekarang == 1){
               \DB::table('voucher')->where('voucherID',$id_voucher)->update([
                    'status' => 0
               ]);
            } else {
               \DB::table('voucher')->where('voucherID',$id_voucher)->update([
                    'status' => 1
               ]);
            }
        return redirect()->route('adminmaster.voucher.show')->with(['success' => 'status has been changed!']);
    }


}
