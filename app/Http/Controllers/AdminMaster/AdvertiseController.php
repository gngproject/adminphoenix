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
     

     public function __construct()
     {
          
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

     public function FormAddAdvertise()
     {
         $data =\DB::table('advertise')->orderby('advertiseid', 'DESC')->first();
         $advertiseID_view = $data->advertiseID_view;
         $advertiseID_view++;
         return view('AdminMaster.AdvertiseAdd',['advertiseID_view' => $advertiseID_view]);
     }

     public function store(Request $request)
     {
          $this->validate($request, [
               'advertiseID_view' => 'required',
               'advertise_name' => 'required',
               'advertise_img' => 'required|image',
          ]);
          if ($request->hasFile('advertise_img')) {
               $advertise_img = $request->file('advertise_img')->store('public/promotion');
          }

        $advertise =  advertisment::create([
           'advertiseID_view'         => $request->advertiseID_view,
           'advertise_name'           => $request->advertise_name,
           'advertise_description'    => $request->advertise_description,
           'advertise_img'            => $advertise_img,
           'status'                   => 0,
        ]);

        return redirect()->route('adminmaster.advertise.shownonactive')->with(['success' => "New Advertise has Successfully Added!"]);
        
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

    public function EdtAdvertise($advertiseID){
        $result=advertisment::all()
        ->where('advertiseID','=', $advertiseID)
        ->first();

        if(empty($result)){
            return response()->json(['message' => 'Advertise Not Found'],204);
        } else {
            return view("AdminMaster.EAdvertise", ['data' => $result]);
        }
    }
    public function AdvertiseUpdate(Request $request, $id_ads)
    {
      $getData = advertisment::all()->where('advertiseID', '=', $id_ads)->first();
      $advertiseID_view              = $request->input("advertiseID_view");
      $advertise_name                = $request->input("advertise_name");
      $advertise_description         = $request->input("advertise_description");
      $advertise_img                 = $request->file('advertise_img');

       if ($request->hasFile('advertise_img')) {
               $advertise_img = $request->file('advertise_img')->store('public/promotion');
          }
      $advertise = advertisment::find($id_ads);
      $advertise->advertiseID_view = $advertiseID_view;
      $advertise->advertise_name = $advertise_name;
      $advertise->advertise_description = $advertise_description;
      $advertise->advertise_img = $advertise_img;

      $advertise->save();
      return redirect()->route('adminmaster.advertise.shownonactive')->with(['success' => 'Advertisement Has Been Successfully Edited!']);


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
        return redirect()->route('adminmaster.advertise.show')->with(['success' => 'status has been changed!']);
    }

    public function editAdvertise($advertiseID)
    {
        return view('AdminMaster.EAdvertise', [
           'data' => $advertiseID,
        ]);
    }
}
