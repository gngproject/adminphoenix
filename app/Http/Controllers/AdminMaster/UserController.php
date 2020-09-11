<?php

namespace App\Http\Controllers\AdminMaster;

use DataTables;
use App\users_table;
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
          $users = users_table::orderBy('created_at', 'ASC');

          return datatables()->of($users)
          ->editColumn('Photo', function(users_table $model) {
               return '<img src="http://adminphoenixjewellery.com/'. $model->Photo .' "height="100px" ">';
          })
          ->editColumn('PhotoKTP', function(users_table $model) {
               return '<img src="http://adminphoenixjewellery.com/'. $model->PhotoKTP .' "height="100px" ">';
          })
          // ->addColumn('action', 'AdminMaster.template.action')
          // ->addColumn('status', 'AdminMaster.template.label')
          ->addIndexColumn()
          ->rawColumns(['Photo','PhotoKTP'])
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
