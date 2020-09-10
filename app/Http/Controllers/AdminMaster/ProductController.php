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
               ->rawColumns(['Product_img_1', 'Product_img_3', 'action', 'status'])
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

     public function FormAddView()
     {
          return view('AdminMaster.ProductAdd');
     }

     public function store(Request $request)
     {

          // dd($request);
          $productID_view       = $request->input("productID_view");
          $Product_type         = $request->input("Product_type");
          $Product_Name         = $request->input("Product_Name");
          $Price                = $request->input("Price");
          $quantity             = $request->input("quantity");
          $weight               = $request->input("weight");
          $emas_karat           = $request->input("emas_karat");
          $berlian_karat1       = $request->input("berlian_karat1");
          $quantity_berlian1    = $request->input("quantity_berlian1");
          $berlian_karat2       = $request->input("berlian_karat2");
          $quantity_berlian2    = $request->input("quantity_berlian2");
          $berlian_karat3       = $request->input("berlian_karat3");
          $quantity_berlian3    = $request->input("quantity_berlian3");
          $berlian_karat4       = $request->input("berlian_karat4");
          $quantity_berlian4    = $request->input("quantity_berlian4");
          $Gender               = $request->input("Gender");
          $Product_img_1        = $request->file("Product_img_1");
          $Product_img_2        = $request->file("Product_img_2");
          $Product_img_3        = $request->file("Product_img_3");
          $Product_img_4        = $request->file("Product_img_4");
          $Product_img_5        = $request->file("Product_img_5");

          $Product_table = new product();
          $Product_table->productID_view = $productID_view;
          $Product_table->Product_type = $Product_type;
          $Product_table->Product_Name = $Product_Name;
          $Product_table->Price = $Price;
          $Product_table->quantity = $quantity;
          $Product_table->weight = $weight;
          $Product_table->emas_karat = $emas_karat;
          $Product_table->berlian_karat1 =  $berlian_karat1;
          $Product_table->berlian_karat2 =  $berlian_karat2;
          $Product_table->berlian_karat3 =  $berlian_karat3;
          $Product_table->berlian_karat4 =  $berlian_karat4;
          $Product_table->quantity_berlian1 =  $quantity_berlian1;
          $Product_table->quantity_berlian2 =  $quantity_berlian2;
          $Product_table->quantity_berlian3 =  $quantity_berlian3;
          $Product_table->quantity_berlian4 =  $quantity_berlian4;

          // $Product_table->Gender = $Gender;

          if (!empty($Product_img_1)) {
               $Product_table->Product_img_1 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_1')->store("public/product1")
                         )
                    );
          }

          if (!empty($Product_img_2)) {
               $Product_table->Product_img_2 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_2')->store("public/product2")
                         )
                    );
          }

          if (!empty($Product_img_3)) {
               $Product_table->Product_img_3 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_3')->store("public/product3")
                         )
                    );
          }

          if (!empty($Product_img_4)) {
               $Product_table->Product_img_4 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_4')->store("public/product4")
                         )
                    );
          }

          if (!empty($Product_img_5)) {
               $Product_table->Product_img_5 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_5')->store("public/product5")
                         )
                    );
          }

          $result = $Product_table->save();
          return redirect()->route('adminmaster.productmaster.show')->with(['success' => 'Your Product Add Has Been Success!']);
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
