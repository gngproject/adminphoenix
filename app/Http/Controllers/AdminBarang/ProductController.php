<?php

namespace App\Http\Controllers\AdminBarang;

use App\User;
use DataTables;
use App\product;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;
use App\Notifications\NewProductNotification;


class ProductController extends Controller
{
     private $__client;

     public function __construct()
     {
         $this->_client = new Client([
              'base_uri'  => 'http://localhost:8000/api/',
               'headers'  => [
                              'API_KEY'      =>'6c1f8962d43c0a2496ef99c365de68a8',
                              'Content-Type' =>'application/x-www-form-urlencoded',
                              'Accept'       =>'application/json'
               ]
         ]);
     }

     public function index()
     {
          return view('AdminBarang.Products');
     }

     public function productData()
     {
          $product = product::orderBy('created_at', 'ASC');

          return datatables()->of($product)
          ->editColumn('Product_img_1', function(product $model) {
               return '<img src="http://192.168.1.105:5000/'. $model->Product_img_1 .' "height="100px" ">';
          })
          ->editColumn('Product_img_2', function(product $model) {
               return '<img src="http://192.168.1.105:5000/'. $model->Product_img_2 .' "height="100px" ">';
          })
          ->addColumn('action', 'AdminBarang.template.action')
          ->addColumn('status', 'AdminBarang.template.label')
          ->addIndexColumn()
          ->rawColumns(['Product_img_1','Product_img_2','Product_img_3','action','status'])
          ->toJson();
     }

     public function view(product $views)
     {
          return view('AdminBarang.View', [
               'views' => $views,
          ]);
     }

     // public function Products()
     // {
     //     $request    = $this->_client->request('GET','productall');
     //     $response   = $request->getBody()->getContents();
     //     $result     = json_decode($response);//jadi data array
     //     // dd($response);
     //     return view('AdminBarang.Home',['TotalProducts'=> $result]);
     // }

     public function Delete($id_product)
     {
          $request      = $this->_client->request('DELETE',"Product_delete/{$id_product}");
          $response     = json_decode($request->getBody()->getContents() );
          return redirect('admin_barang/product_show')->with('status', 'Delete Success !!');
          // dd($response);
     }

    public function edit(product $product)
     {
          return view('AdminBarang.EditProduct', [
               'product' => $product,
          ]);
          // dd($product);
     }

     public function update_photo_product($files_Photo, $db_path, $folder)
     {
          if($db_path != null){
              $willdelete = str_replace("storage","public",$db_path);
              Storage::delete($willdelete);
          }
          $New_path = str_replace("public","storage",$files_Photo->store('public/'.$folder));
          return $New_path;
     }

     public function update(Request $request, $id_product)
     {

          $this->validate($request, [
               'productID_view'    => 'required',
               'Product_Name'      => 'required',
               'description'       => 'required',
               'Price'             => 'required|numeric',
               'quantity'          => 'required|numeric',
               'Product_img_1'     => 'image|mimes:png,jpeg,jpg|max:2048',
               'Product_img_2'     => 'image|mimes:png,jpeg,jpg|max:2048',
               'Product_img_3'     => 'image|mimes:png,jpeg,jpg|max:2048',
               'Product_img_4'     => 'image|mimes:png,jpeg,jpg|max:2048',
               'Product_img_5'     => 'image|mimes:png,jpeg,jpg|max:2048',
          ]);

          $getData = product::all()->where('productID','=',$id_product)->first();

          $productID_view     = $request->input("productID_view");
          $Product_type       = $request->input("Product_type");
          $Product_Name       = $request->input("Product_Name");
          $description        = $request->input("description");
          $Price              = $request->input("Price");
          $Gender             = $request->input("Gender");
          $quantity           = $request->input("quantity");
          $Product_img_1      = $request->file("Product_img_1");
          $Product_img_2      = $request->file("Product_img_2");
          $Product_img_3      = $request->file("Product_img_3");
          $Product_img_4      = $request->file("Product_img_4");
          $Product_img_5      = $request->file("Product_img_5");

          $product = product::find($id_product);

          if($productID_view !=null || $productID_view !=''){
               $product->productID_view = $productID_view;
          }

          if($Product_type !=null || $Product_type !=''){
               $product->Product_type = $Product_type;
          }

          if($Product_Name !=null || $Product_Name !=''){
               $product->Product_Name = $Product_Name;
          }

          if($description !=null || $description !=''){
               $product->description = $description;
          }

          if($Price !=null || $Price !=''){
               $product->Price = $Price;
          }

          if($Gender !=null || $Gender !=''){
               $product->Gender = $Gender;
          }

          if($quantity !=null || $quantity !=''){
               $product->quantity = $quantity;
          }

           if(!empty($Product_img_1)){
              $path_Product_img_1 = $this->update_photo_product($Product_img_1, $getData->Product_img_1, 'product1');
              $product->Product_img_1 = $path_Product_img_1;
          }

           if(!empty($Product_img_2)){
               $path_Product_img_2 = $this->update_photo_product($Product_img_2, $getData->Product_img_2, 'product2');
               $product->Product_img_2 = $path_Product_img_2;
          }

           if(!empty($Product_img_3)){
               $path_Product_img_3 = $this->update_photo_product($Product_img_3, $getData->Product_img_3, 'product3');
               $product->Product_img_3 = $path_Product_img_3;
          }

           if(!empty($Product_img_4)){
               $path_Product_img_4 = $this->update_photo_product($Product_img_4, $getData->Product_img_4, 'product4');
               $product->Product_img_4 = $path_Product_img_4;
          }

           if(!empty($Product_img_5)){
               $path_Product_img_5 = $this->update_photo_product($Product_img_5, $getData->Product_img_5, 'product5');
               $product->Product_img_5 = $path_Product_img_5;
          }

          $product->save();
          return redirect()->route('adminbarang.product.show')->with(['success' => 'Your Product Edit Has Been Success!']);
          // dd($product);

     }

     public function store(Request $request)
     {
        $productID_view     = $request->input("productID_view");
        $Product_type       = $request->input("Product_type");
        $Product_Name       = $request->input("Product_Name");
        $description        = $request->input("description");
        $Price              = $request->input("Price");
        $quantity           = $request->input("quantity");
        $Gender             = $request->input("Gender");
        $Product_img_1      = $request->file("Product_img_1");
        $Product_img_2      = $request->file("Product_img_2");
        $Product_img_3      = $request->file("Product_img_3");
        $Product_img_4      = $request->file("Product_img_4");
        $Product_img_5      = $request->file("Product_img_5");

        $Product_table = new product();
        $Product_table->productID_view = $productID_view;
        $Product_table->Product_type = $Product_type;
        $Product_table->Product_Name = $Product_Name;
        $Product_table->description = $description;
        $Product_table->Price = $Price;
        $Product_table->quantity = $quantity;
        $Product_table->Gender = $Gender;

          if(!empty($Product_img_1)){
            $Product_table->Product_img_1 =
            strval(
                 str_replace(
                      "public","storage", $request->file('Product_img_1')->store("public/product1")
                    )
               );
          }

          if(!empty($Product_img_2)){
            $Product_table->Product_img_2 =
            strval(
                 str_replace(
                      "public","storage", $request->file('Product_img_2')->store("public/product2")
                    )
               );
          }

        if(!empty($Product_img_3)){
            $Product_table->Product_img_3 =
            strval(
                 str_replace(
                      "public","storage", $request->file('Product_img_3')->store("public/product3")
                       )
                );

        }

        if(!empty($Product_img_4)){
            $Product_table->Product_img_4 =
            strval(
                 str_replace(
                      "public","storage", $request->file('Product_img_4')->store("public/product4")
                       )
                );
        }

        if(!empty($Product_img_5)){
            $Product_table->Product_img_5 =
            strval(
                 str_replace(
                      "public","storage", $request->file('Product_img_5')->store("public/product5")
                       )
                );
        }

        $result= $Product_table->save();
        return redirect()->route('adminbarang.product.show')->with(['success' => 'Your Product Add Has Been Success!']);

     }

     public function status($id_product)
     {
          $status_product = \DB::table('product')->where('productID',$id_product)->first();
          $status_sekarang = $status_product->status;

          if($status_sekarang == 1){
               \DB::table('product')->where('productID',$id_product)->update([
                    'status' => 0
               ]);
          } else {
               \DB::table('product')->where('productID',$id_product)->update([
                    'status' => 1
               ]);
          }

          return redirect()->route('adminbarang.product.show')->with(['success' => 'status has been changed!']);
     }


}
