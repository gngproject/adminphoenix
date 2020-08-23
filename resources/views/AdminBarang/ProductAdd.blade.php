@extends('AdminBarang.template.default')

@section('title', 'Add Data Product')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Add Product</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('adminbarang.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('adminbarang.product.show') }}">Product All</a></li>
          <li class="breadcrumb-item active">Add Product</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('adminbarang.product.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="productID_view">Product ID</label>
            <input type="text" class="form-control" id="productID_view" name="productID_view">
            @if ($errors->has('productID_view'))
              <span class="text-danger">{{ $errors->first('productID_view') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="Product_Name">Product Name</label>
            <input type="text" class="form-control" id="Product_Name" name="Product_Name">
            @if ($errors->has('Product_Name'))
              <span class="text-danger">{{ $errors->first('Product_Name') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" id="Gender" name="Gender" >
              <option></option>
              <option value="0">Wanita</option>
              <option value="1">Pria</option>
              <option value="2">Universal</option>
              <option value="3">Anak-Anak</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Price">Price</label>
            <input type="text" class="form-control" id="Price" name="Price">
            @if ($errors->has('description'))
              <span class="text-danger">{{ $errors->first('Price') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="Price">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity">
            @if ($errors->has('quantity'))
              <span class="text-danger">{{ $errors->first('quantity') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="Weight">Weight</label>
            <input type="text" class="form-control" id="weight" name="weight">
            @if ($errors->has('weight'))
              <span class="text-danger">{{ $errors->first('weight') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Product Type</label>
            <select class="form-control" id="Product_type" name="Product_type">
              <option></option>
              <option value="0">Diamond Ring</option>
              <option value="1">Wedding Ring</option>
              <option value="2">GIA</option>
              <option value="3">Liontin</option>
              <option value="4">Anting</option>
              <option value="5">Cincin</option>
            </select>
          </div>
          <div class="form-group">
            <label>Emas Yang Dipasang</label>
              <textarea class="form-control" id="emas_karat" name="emas_karat" rows="2" placeholder="Cincin berlian dengan 18 karat..."></textarea>
            @if ($errors->has('emas_karat'))
              <span class="text-danger">{{ $errors->first('emas_karat') }}</span>
            @endif
          </div>
          <div class="row">
            <div class="col">
              <label for="berlian">Berlian Yang Dipasang</label>
              <input type="number" class="form-control" id="berlian_karat1" name="berlian_karat1" placeholder="0.0001" step="0.0001" min="0" max="10"> <br>
              <input type="number" class="form-control" id="berlian_karat2" name="berlian_karat2" placeholder="0.0001" step="0.0001" min="0" max="10"> <br>
              <input type="number" class="form-control" id="berlian_karat3" name="berlian_karat3" placeholder="0.0001" step="0.0001" min="0" max="10"> <br>
              <input type="number" class="form-control" id="berlian_karat4" name="berlian_karat4" placeholder="0.0001" step="0.0001" min="0" max="10"> <br>
           
              @if ($errors->has('berlian_karat1'))
                <span class="text-danger">{{ $errors->first('berlian_karat1') }}</span>
              @endif
            </div>
            <div class="col">
              <label for="berlian">Quantity Berlian</label>
              <input type="number" class="form-control" id="quantity_berlian1" name="quantity_berlian1" placeholder="0" step="1" min="0" required> <br>
              <input type="number" class="form-control" id="quantity_berlian2" name="quantity_berlian2" placeholder="0" step="1" min="0"> <br>
              <input type="number" class="form-control" id="quantity_berlian3" name="quantity_berlian3" placeholder="0" step="1" min="0"> <br>
              <input type="number" class="form-control" id="quantity_berlian4" name="quantity_berlian4" placeholder="0" step="1" min="0"> <br>
           
              @if ($errors->has('quantity_berlian1'))
                <span class="text-danger">{{ $errors->first('quantity_berlian1') }}</span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label>Colour & Clarity</label>
            <select class="form-control" id="colour" name="colour">
              <option></option>
              <option value="1">F & VVS</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Product_img_1">Product Image 1</label>
              <input type="file" class="form-control" id="Product_img_1" name="Product_img_1">
              @if ($errors->has('Product_img_1'))
                <span class="text-danger">{{ $errors->first('Product_img_1') }}</span>
              @endif
          </div>
          <div class="form-group">
            <label for="Product_img_2">Product Image 2</label>
              <input type="file" class="form-control" id="Product_img_2" name="Product_img_2">
              @if ($errors->has('Product_img_2'))
                <span class="text-danger">{{ $errors->first('Product_img_2') }}</span>
              @endif
          </div>
          <div class="form-group">
            <label for="Product_img_3">Product Image 3</label>
              <input type="file" class="form-control" id="Product_img_3" name="Product_img_3">
              @if ($errors->has('Product_img_3'))
                <span class="text-danger">{{ $errors->first('Product_img_3') }}</span>
              @endif
          </div>
          <div class="form-group">
            <label for="Product_img_4">Product Image 4</label>
              <input type="file" class="form-control" id="Product_img_4" name="Product_img_4">
              @if ($errors->has('Product_img_4'))
                <span class="text-danger">{{ $errors->first('Product_img_4') }}</span>
              @endif
          </div>
          <div class="form-group">
            <label for="Product_img_5">Product Image 5</label>
              <input type="file" class="form-control" id="Product_img_5" name="Product_img_5">
              @if ($errors->has('Product_img_5'))
                <span class="text-danger">{{ $errors->first('Product_img_5') }}</span>
              @endif
          </div>
          <div class="col-md-12">
            <button type="submit" value="submit" onclick="return confirm('Are you sure this data product ?')"
            class="btn-block btn-flat btn-primary">SUBMIT</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@include('sweetalert::alert')
@endsection