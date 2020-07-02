<?php

namespace App\Http\Controllers\AdminPengirim;

use DataTables;
use App\midpayment;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;

class PengirimanController extends Controller
{
    private $__client;

    public function __construct()
    {
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
        // $request  = $this->_client->request('GET','pengiriman/show');
        // $response = $request->getBody()->getContents();
        // $responses = json_decode($response);//jadi data array
        return view('AdminPengirim.Pengiriman');
    }

    public function PengirimanData()
    {
        $midpayments = midpayment::all();

        return datatables()->of($midpayments)
        ->addColumn('action', 'AdminPengirim.template.action')
        ->addColumn('status', 'AdminPengirim.template.label')
        ->addIndexColumn()
        ->rawColumns(['action','status'])
        ->toJson();
    }

    // public function searchbystatus()
    // {
    //     $orders = midpayment::where('status', '=', 'success')->get();

    //     if (request()->q != '') {
    //         $orders = $orders->where(function($q) {
    //             $q->where('nama_penerima', 'LIKE', '%' . request()->q . '%')
    //             ->orWhere('ID_payment', 'LIKE', '%' . request()->q . '%')
    //             ->orWhere('alamat', 'LIKE', '%' . request()->q . '%');
    //         });
    //     }

    //     if (request()->status_kirim != '') {
    //         $orders = $orders->where('status_kirim', request()->status_kirim);
    //     }
    //     $orders = $orders->paginate(10);
    //     return view('AdminPengirim.Pengiriman', compact('orders'));
    // }

    public function Detail($id_payment)
    {
        $request       = $this->_client->request('GET',"pengiriman/{$id_payment}");
        $result        = json_decode($request->getBody()->getContents());

        return view('AdminPengirim.ViewPengiriman', ['result'=> $result]);
        // dd($result);
    }

    public function ShippingOrder(Request $request)
    {
        $response = $this->_client->request("POST","pengiriman",
        [
            "form_params" =>[
                      'ID_payment'       => $request->get("ID_payment"),
                      'tracking_number'  => $request->get("tracking_number"),
                      'status_kirim'     => 3,
            ],

        ]);

        $result = $response->getStatusCode();
        return redirect(route('adminpengirim.pengiriman.home'))->with(['success' => 'Tracking Number has been successfully !']);
    }


}
