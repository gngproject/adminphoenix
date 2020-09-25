<?php

namespace App\Http\Controllers\AdminMaster;

use DataTables;
use App\product;
use App\Http\Requests;
use App\customize_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
     public function index()
     {
          return view('AdminMaster.Products');
     }

     public function productDataMaster()
     {
          $product = product::orderBy('created_at', 'DESC');

          return datatables()->of($product)
               ->editColumn('Product_img_1', function (product $model) {
                    return '<img src="https://adminphoenixjewellery.com/' . $model->Product_img_1 . ' "height="100px" ">';
               })
               ->addColumn('action', 'AdminMaster.template.action')
               ->addColumn('status', 'AdminMaster.template.label')
               ->addIndexColumn()
               ->rawColumns(['Product_img_1', 'Product_img_3', 'action', 'status'])
               ->toJson();
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
         $data =\DB::table('product')->orderby('productid', 'DESC')->first();
         $productID_view =$data->productID_view;
         $productID_view++;
          return view('AdminMaster.ProductAdd',['productID_view'=> $productID_view]);
     }

     public function store(Request $request)
     {

          $productID_view       = $request->input("productID_view");
          $Product_type         = $request->input("Product_type");
          $Product_Name         = $request->input("Product_Name");
          $Price                = $request->input("Price");
          $stock                = $request->input("stock");
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
          $typeID               = $request->input("typeID");
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
          $Product_table->stock = $stock;
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
          $Product_table->Gender =  $Gender;
          $Product_table->typeID =  $typeID;

          if (!empty($Product_img_1)) {
               $Product_table->Product_img_1 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_1')->store("storage/PhotoProduct")
                         )
                    );
          }

          if (!empty($Product_img_2)) {
               $Product_table->Product_img_2 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_2')->store("storage/PhotoProduct2")
                         )
                    );
          }

          if (!empty($Product_img_3)) {
               $Product_table->Product_img_3 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_3')->store("storage/PhotoProduct3")
                         )
                    );
          }

          if (!empty($Product_img_4)) {
               $Product_table->Product_img_4 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_4')->store("storage/PhotoProduct4")
                         )
                    );
          }

          if (!empty($Product_img_5)) {
               $Product_table->Product_img_5 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_5')->store("storage/PhotoProduct5")
                         )
                    );
          }


          $result = $Product_table->save();
          return redirect()->route('adminmaster.productmaster.show')->with(['success' => 'Your Product Add Has Been Success!']);
     }

     public function editView($id_product)
     {
          $data = \DB::table('product')->where('productID', $id_product)->first();
          return view('AdminMaster.ProductEdit', ['data' => $data]);
     }

     public function update(Request $request, $idProduct)
     {

          $productID_view       = $request->input("productID_view");
          $Product_type         = $request->input("Product_type");
          $Product_Name         = $request->input("Product_Name");
          $Price                = $request->input("Price");
          $stock                = $request->input("stock");
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

          $Product_table = product::find($idProduct);
          $Product_table->productID_view = $productID_view;
          $Product_table->Product_type = $Product_type;
          $Product_table->Product_Name = $Product_Name;
          $Product_table->Price = $Price;
          $Product_table->stock = $stock;
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

          if (!empty($Product_img_1)) {
               $Product_table->Product_img_1 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_1')->store("storage/PhotoProduct")
                         )
                    );
          }

          if (!empty($Product_img_2)) {
               $Product_table->Product_img_2 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_2')->store("storage/PhotoProduct2")
                         )
                    );
          }

          if (!empty($Product_img_3)) {
               $Product_table->Product_img_3 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_3')->store("storage/PhotoProduct3")
                         )
                    );
          }

          if (!empty($Product_img_4)) {
               $Product_table->Product_img_4 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_4')->store("storage/PhotoProduct4")
                         )
                    );
          }

          if (!empty($Product_img_5)) {
               $Product_table->Product_img_5 =
                    strval(
                         str_replace(
                              "public",
                              "storage",
                              $request->file('Product_img_5')->store("storage/PhotoProduct5")
                         )
                    );
          }
          $Product_table->save();

          return redirect()->route('adminmaster.productmaster.show')->with(['success' => 'status has been changed!']);
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


     // Controller Customize Product

    public function customizeview()
    {
        return view('AdminMaster.ProductsCustomize');
    }

    public function productDataCustomize()
    {
        $customize_product = customize_product::all();

        return datatables()->of($customize_product)
            ->editColumn('referensi', function (customize_product $model) {
                return '<img src="https://adminphoenixjewellery.com/' . $model->referensi . ' "height="100px" ">';
            })
           ->addColumn('action', 'AdminMaster.template.action_customize')
           ->addColumn('status', 'AdminMaster.template.label_customize')
           ->addIndexColumn()
           ->rawColumns(['referensi','action','status'])
           ->toJson();
    }

     public function status_customize($id)
     {
          $status_customizeproduct = \DB::table('customize_product')->where('id', $id)->first();
          $status_sekarang = $status_customizeproduct->status;

          if ($status_sekarang == 0) {
               \DB::table('customize_product')->where('id', $id)->update([
                    'status' => 1
               ]);
          } else if ($status_sekarang == 1) {
               \DB::table('customize_product')->where('id', $id)->update([
                    'status' => 2
               ]);
          } else {
               \DB::table('customize_product')->where('id', $id)->update([
                    'status' => 0
               ]);
          }
          return redirect()->route('adminmaster.productmaster.customize')->with(['success' => 'status has been changed!']);
     }
}
