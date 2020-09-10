<?php

namespace App\Http\Controllers\AdminMaster;

use View;
use DataTables;
use App\advertisment;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;

class AdvertiseController extends Controller
{
     private $__client;

     public function __construct()
     {
          $this->_client = new Client([
               'base_uri' => 'http://localhost:8000/api/',
               'headers'  => [
                    'API_KEY'      => '6c1f8962d43c0a2496ef99c365de68a8',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Accept'       => 'application/json'
               ]
          ]);
     }

     public function index()
     {
          return view('AdminMaster.Advertise');
     }

     public function AdvertMaster()
     {
          $advertises = advertisment::where('status', '=', 1)->get();

          return datatables()->of($advertises)

                ->editColumn('advertise_img', function ($advertises) {
                    return '<img src="http://adminphoenixjewellery.com/' . $advertises->advertise_img . ' "height="100px" ">';
               })
               ->addColumn('actionadvertise', 'AdminMaster.template.action_advert')
               ->addColumn('status', 'AdminMaster.template.label')
               ->addIndexColumn()
               ->rawColumns(['advertise_img','actionadvertise', 'status'])
               ->toJson();
     }

     public function ShowNonActive()
     {
          return view('AdminMaster.AdvTrash');
     }

     public function NonActiveAdvertiseMaster()
     {
          $advertises = advertisment::where('status', '=', 0)->get();

          return datatables()->of($advertises)
               ->editColumn('advertise_img', function ($advertises) {
                    return '<img src="http://adminphoenixjewellery.com/' . $advertises->advertise_img . ' "height="100px" ">';
               })
               ->addColumn('actionadvertise', 'AdminMaster.template.action_advert')
               ->addColumn('status', 'AdminMaster.template.label')
               ->addIndexColumn()
               ->rawColumns(['advertise_img', 'actionadvertise', 'status'])
               ->toJson();
     }

     public function store(Request $request)
     {

          // $this->validate($request, [
          //      'advertiseID_view'  => 'required',
          //      'advertise_name'    => 'required',

          //      'advertise_img'     => 'required|file|image|max:2000', // max 2MB
          // ]);

          // dd($request->file('advertise_img'));


          if ($request->hasFile('advertise_img')) {
               $advertise_img = $request->file('advertise_img')->store('public/advertisment');
          }

          $advertise =  advertisment::create([
               'advertiseID_view'         => $request->advertiseID_view,
               'advertise_name'           => $request->advertise_name,
               'advertise_description'    => $request->advertise_description,
               'advertise_img'            => $advertise_img,
               'status'                   => 0,
          ]);


          return redirect()->back()->with(['success' => 'Your Add Advertise Has Been Success!']);
          // dd($test);
     }

     public function AdsDeleteSoft($id_ads)
     {
          $request      = $this->_client->request('DELETE', "advertise/delete/{$id_ads}");
          $response     = json_decode($request->getBody()->getContents());
          return redirect("/admin_master/AdvertShow")->with(['success' => 'Delete Has Been Success !']);
          // dd($response);
     }

     public function RestoreAdvertise($id_ads)
     {
          $request    = $this->_client->request('GET', "restore/advertise/{$id_ads}");
          $response   = $request->getBody()->getContents();
          $responses  = json_decode($response); //jadi data array
          // var_dump($responses);
          return redirect("/admin_master/Advertisetrash")->with(['success' => 'restore Has Been Success !']);
     }

     public function EdtAdvertise($id_ads)
     {
          $data = \DB::table('advertise')->where('advertiseID', $id_ads)->first();
          // $response      = $this->_client->request('GET', "advertisment/{$id_ads}");
          // $result        = json_decode($response->getBody()->getContents());
          // $data          = ['response' => $result];
          return View::make('AdminMaster.EAdvertise', compact('data'));
          // return view("AdminMaster.EAdvertise", $data);
          // var_dump($data);
     }

     public function update_photo_advertise($advertise_img, $db_path, $folder)
     {
          if ($db_path != null) {
               $willdelete = str_replace("storage", "public", $db_path);
               Storage::delete($willdelete);
          }

          $New_path = str_replace("public", "storage", $advertise_img->store('public/' . $folder));
          return $New_path;
     }


     public function AdvertiseUpdate(Request $request, $id_ads)
     {
          $getData = advertisment::all()->where('advertiseID', '=', $id_ads)->first();
          $advertiseID_view              = $request->input("advertiseID_view");
          $advertise_name                = $request->input("advertise_name");
          $advertise_description         = $request->input("advertise_description");
          $advertise_img                 = $request->file('advertise_img');

          $path_advertise = $this->update_photo_advertise($advertise_img , $getData->advertise_img , 'advertiseimg');
          $advertise = advertisment::find($id_ads);
          $advertise->advertiseID_view = $advertiseID_view;
          $advertise->advertise_name = $advertise_name;
          $advertise->advertise_description = $advertise_description;
          $advertise->advertise_img = $path_advertise;

          $advertise->save();
          return redirect()->route('adminmaster.advertise.shownonactive')->with(['success' => 'Your Product Add Has Been Success!']);


          // $response = $this->_client->request("POST", '/advertise/update/{$id_ads}', [

          //      'json' => [
          //           'advertiseID'                => $request->get("advertiseID"),
          //           'advertiseID_view'           => $request->get("advertiseID_view"),
          //           'advertise_name'             => $request->get("advertise_name"),
          //           'advertise_description'      => $request->get("advertise_description"),
          //      ]

          // ]);


     }

     public function PermanentAdv($id_ads)
     {
          $request  = $this->_client->request('GET', "advertise/deletepermanent/{$id_ads}");
          $response = $request->getBody()->getContents();
          $responses = json_decode($response); //jadi data array
          // dd($responses);
          return redirect("/admin_master/Advertisetrash")->with(['success' => 'Delete Permanent Has Been Success !']);
     }

     public function status($id_ads)
     {
          $status_advertisment = \DB::table('advertise')->where('advertiseID', $id_ads)->first();
          $status_sekarang = $status_advertisment->status;
          if ($status_sekarang == 1) {
               \DB::table('advertise')->where('advertiseID', $id_ads)->update([
                    'status' => 0
               ]);
          } else {
               \DB::table('advertise')->where('advertiseID', $id_ads)->update([
                    'status' => 1
               ]);
          }
          return redirect()->route('adminmaster.advertise.shownonactive')->with(['success' => 'status has been changed!']);
     }

     public function editAdvertise($advertiseID)
     {
          dd($advertiseID);

          return view('AdminMaster.EAdvertise', [
               'data' => $advertiseID,
          ]);
          // dd($product);
     }
}
