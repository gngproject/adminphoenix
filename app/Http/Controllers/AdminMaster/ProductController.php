<?php

namespace App\Http\Controllers\AdminMaster;

use DataTables;
use App\product;
use GuzzleHttp\Client;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;


class ProductController extends Controller
{
     private $__client;

     public function __construct()
     {
          $this->_client = new Client([
               'base_uri'  => 'http://localhost:8000/api/',
               'headers'  => [
                    'API_KEY'      => '6c1f8962d43c0a2496ef99c365de68a8',
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Accept'       => 'application/json'
               ]
          ]);
     }

     public function index()
     {
          return view('AdminMaster.Products');
     }

     public function productDataMaster()
     {
          $product = product::orderBy('created_at', 'ASC');

          return datatables()->of($product)
               ->editColumn('Product_img_1', function (product $model) {
                    return '<img src="http://adminphoenixjewellery.com/' . $model->Product_img_1 . ' "height="100px" ">';
               })
               ->addColumn('action', 'AdminMaster.template.action')
               ->addColumn('status', 'AdminMaster.template.label')
               ->addIndexColumn()
               ->rawColumns(['Product_img_1', 'Product_img_2', 'Product_img_3', 'action', 'status'])
               ->toJson();
     }

     public function Products()
     {
          $request    = $this->_client->request('GET', 'productall');
          $response   = $request->getBody()->getContents();
          $result     = json_decode($response); //jadi data array
          // dd($response);
          return view('AdminMaster.Home', ['TotalProducts' => $result]);
     }

     public function view(product $view)
     {
          $gettype = DB::table("product")->join('diamondtype', 'diamondtype.id', '=', 'product.typeID')->where('productID', $view->productID)->get();

          return view("AdminMaster.ViewProduct", [
               'view' => $view, 'gettype' => $gettype
          ]);
     }
     public function view_berlian(product $view)
     {
          return view("AdminMaster.Berlian", [
               'view' => $view,
          ]);
     }


     public function ProductUpdate(Request $request, $id_product)
     {
          $response = $this->_client->request('POST', 'product_update/{$id_product}', [

               'json' => [
                    'productID'      => $request->get("productID"),
                    'productID_view' => $request->get("productID_view"),
                    'Product_type'   => $request->get("Product_type"),
                    'Product_Name'   => $request->get("Product_Name"),
                    'description'    => $request->get("description"),
                    'Price'          => $request->get("Price"),
                    'Gender'         => $request->get("Gender"),
                    'quantity'       => $request->get("quantity"),
               ]

          ]);

          $result = $response->send();

          // return view('Product.ProductAll');
          dd($result);
     }

     public function Delete($id_product)
     {
          $request      = $this->_client->request('DELETE', "Product_delete/{$id_product}");
          $response     = json_decode($request->getBody()->getContents());
          return redirect('/admin_master/ProductShow')->with('status', 'Delete Success !!');
          // dd($response);
     }

     public function status($id_product)
     {
          $status_product = \DB::table('product')->where('productID', $id_product)->first();
          $status_sekarang = $status_product->status;

          if ($status_sekarang == 1) {
               \DB::table('product')->where('productID', $id_product)->update([
                    'status' => 0
               ]);
          } else {
               \DB::table('product')->where('productID', $id_product)->update([
                    'status' => 1
               ]);
          }
          return redirect()->route('adminmaster.productmaster.show')->with(['success' => 'status has been changed!']);
     }
}
