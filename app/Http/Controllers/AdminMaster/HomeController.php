<?php

namespace App\Http\Controllers\AdminMaster;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;

class HomeController extends Controller
{
    private $__client;

     public function __construct() {
       
    }

    public function index(){
        return view ('AdminMaster.Home');
    }

    public function TotalTransaction()
    {
         $request    = $this->_client->request('GET','alltransaction');
         $response   = $request->getBody()->getContents();
         $result     = json_decode($response);//jadi data array
         // dd($response);
         return view('AdminMaster.Home',['TotalTransaction'=> $result]);
    }


}
