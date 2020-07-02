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
          $this->_client = new Client([
               'base_uri' => 'http://localhost:8000/api/',
               'headers'  => [
                              'API_KEY'      =>'6c1f8962d43c0a2496ef99c365de68a8',
                              'Content-Type' =>'application/x-www-form-urlencoded',
                              'Accept'       =>'application/json'
                              ]
          ]);
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
