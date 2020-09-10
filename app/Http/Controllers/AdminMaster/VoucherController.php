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

    public function VoucherAddView()
    {
        return view('AdminMaster.VoucherAdd');
    }

    public function VoucherAdd(Request $req)
    {
        $voucherID_view             = $req->input('voucherID_view');
        $voucherCode                = $req->input('voucherCode');
        $type                       = $req->input('type');
        $voucherPercent             = $req->input('voucherPercent');
        $voucherDiscount            = $req->input('voucherDiscount');
        $voucherMax_user            = $req->input('voucherMax_user');

        $vouch_table = new voucher();
        $vouch_table->voucherID_view               = $voucherID_view;
        $vouch_table->voucherCode                  = $voucherCode;
        $vouch_table->type                         = $type;
        $vouch_table->voucherPercent               = $voucherPercent;
        $vouch_table->voucherDiscount              = $voucherDiscount;
        $vouch_table->voucherMax_user              = $voucherMax_user;

        $res=$vouch_table->save();

        if($res==1){
            return redirect("/admin_master/VoucherAddView")->with(['success' => 'Your Voucher Has Been Success !']);
        }
        else{
            return Response()->json(['message' => 'something wrong'],500);
        }

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
        $result=voucher::all()
        ->where('voucherID','=', $voucherid)
        ->first();

        if(empty($result)){
            return response()->json(['message' => 'Voucher Not Found'],204);
        } else {
            return view("AdminMaster.VoucherEdit", ['result' => $result]);
        }
    }

    public function UpdateVoucher(Request $request, $voucherid)
    {
        $getData = voucher::all()
            ->where('voucherID','=', $voucherid)->first();

        $voucherID_view     = $request->input("voucherID_view");
        $voucherCode        = $request->input("voucherCode");
        $type               = $request->input("type");
        $voucherPercent     = $request->input("voucherPercent");
        $voucherDiscount    = $request->input("voucherDiscount");
        $voucherMax_user    = $request->input("voucherMax_user");

        $voucher_table = voucher::find($voucherid);

        if ($voucherID_view !=null || $voucherID_view !='')
        {
            $voucher_table->voucherID_view = $voucherID_view;
        }
        if ($voucherCode !=null || $voucherCode !='')
        {
            $voucher_table->voucherCode = $voucherCode;
        }
        if($type !=null || $type !='')
        {
            $voucher_table->type = $type;
        }
        if($voucherPercent !=null || $voucherPercent !='')
        {
            $voucher_table->voucherPercent = $voucherPercent;
        }
        if($voucherDiscount !=null || $voucherDiscount !='')
        {
            $voucher_table->voucherDiscount = $voucherDiscount;
        }
        if($voucherMax_user !=null || $voucherMax_user !='')
        {
            $voucher_table->voucherMax_user = $voucherMax_user;
        }

        $result = $voucher_table->save();

        if($result == 1){
            return redirect("/admin_master/VoucherShow")->with(['success' => 'Voucher has been edited successfully !']);
        } else {
            return Response()->json(['message' => 'Error Json'],500);
        }

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
