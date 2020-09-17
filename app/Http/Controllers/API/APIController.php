<?php

namespace App\Http\Controllers\API;


use App\product;
use App\advertisment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class APIController extends Controller
{

    public function apiproductall()
    {
        $getdata = product::all();
        return response()->json($getdata,200);
    }

    public function apiproductwomen()
    {
        $getdata = product::where("Gender","=",0)->paginate(6);
        return response()->json($getdata,200);
    }

    public function apiproductmen()
    {
        $getdata = product::where("Gender","=",1)->paginate(6);
        return response()->json($getdata,200);
    }

    public function apiproductunvr()
    {
        $getdata = product::where("Gender","=",2)->paginate(6);
        return response()->json($getdata,200);
    }

    public function apiadvertiseall()
    {
        $apiadvertisment = advertisment::where('status','=',"1")->get();
        return response()->json($apiadvertisment);
    }

}
