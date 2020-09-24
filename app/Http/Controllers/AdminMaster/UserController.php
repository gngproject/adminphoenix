<?php

namespace App\Http\Controllers\AdminMaster;

use DataTables;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Services\DataTable;
use GuzzleHttp\Exception\GuzzleException;

class UserController extends Controller
{
    private $__client;

     public function __construct() {
          $this->_client = new Client([
               'base_uri' => 'http://localhost:8000/api/',
          ]);
     }

    public function index()
     {
        return view("AdminMaster.Users");
     }

     public function UsersDataMaster()
     {
          $users = User::orderBy('created_at', 'DESC');

          return datatables()->of($users)
          ->editColumn('photo', function(User $model) {
              if($model->photo){
                  return '<img src="http://adminphoenixjewellery.com/'. $model->photo .' "height="100px" ">';
              } else {
                  return '<img src="https://adminphoenixjewellery.com/Assets/img/default.jpg" img style="width:120px; height:160px">';
              }
          })
          ->editColumn('photoktp', function(User $model) {
              if($model->photoktp){
                  return '<img src="http://adminphoenixjewellery.com/'. $model->photoktp .' "height="100px" ">';
              } else {
                  return '<img src="https://adminphoenixjewellery.com/Assets/img/default.jpg" img style="width:120px; height:160px">';
              }
          })
          // ->addColumn('action', 'AdminMaster.template.action')
          // ->addColumn('status', 'AdminMaster.template.label')
          ->addIndexColumn()
          ->rawColumns(['photo','photoktp'])
          ->toJson();
     }

    public function TotalUserRegis()
    {
         $request    = $this->_client->request('GET','userall');
         $response   = $request->getBody()->getContents();
         $result     = json_decode($response);//jadi data array
         // dd($response);
         return view('AdminMaster.Home',['TotalUserRegis'=> $result]);
    }
}
