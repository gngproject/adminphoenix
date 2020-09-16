@extends('AdminMaster.template.default')

@section('title', 'Edit Data Product')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Edit Product</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('adminmaster.productmaster.show') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('adminmaster.productmaster.data') }}">Product All</a></li>
          <li class="breadcrumb-item active">Edit Product</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('adminmaster.productmaster.updatedata', [$data->productID]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card-body">
          <div class="form-group">
            <label for="productID_view">Product ID</label>
            <input type="text" class="form-control" id="productID_view" name="productID_view" value="{{$data->productID_view}}" readonly>
            @if ($errors->has('productID_view'))
              <span class="text-danger">{{ $errors->first('productID_view') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="Product_Name">Product Name</label>
            <input type="text" class="form-control" id="Product_Name" name="Product_Name" value="{{$data->Product_Name}}">
            @if ($errors->has('Product_Name'))
              <span class="text-danger">{{ $errors->first('Product_Name') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" id="Gender" name="Gender" >
              @if($data->Gender == '0')
              <option value="{{$data->Gender}}">{{ $data->Gender = 'Wanita' }}</option>
              @elseif($data->Gender == '1')
              <option value="{{$data->Gender}}">{{ $data->Gender = 'Pria'}}
              @elseif($data->Gender == '2')
              <option value="{{$data->Gender}}">{{ $data->Gender = 'Universal'}}
              @elseif($data->Gender == '3')
              <option value="{{$data->Gender}}">{{ $data->Gender = 'Anak-Anak'}}
             
              @endif
             
              <option value="0">Wanita</option>
              <option value="1">Pria</option>
              <option value="2">Universal</option>
              <option value="3">Anak-Anak</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Price">Price</label>
            <input type="text" class="form-control" id="Price" name="Price" value="{{$data->Price}}">
            @if ($errors->has('description'))
              <span class="text-danger">{{ $errors->first('Price') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock" value="{{$data->stock}}">
            @if ($errors->has('stock'))
              <span class="text-danger">{{ $errors->first('stock') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="Weight">Weight</label>
            <input type="text" class="form-control" id="weight" name="weight" value="{{$data->weight}}">
            @if ($errors->has('weight'))
              <span class="text-danger">{{ $errors->first('weight') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label>Product Type</label>
            <select class="form-control" id="Product_type" name="Product_type">
              @if($data->Product_type == '0')
              <option value="{{$data->Product_type}}">{{ $data->Product_type = 'Diamond Ring' }}</option>
              @elseif($data->Product_type == '1')
              <option value="{{$data->Product_type}}">{{ $data->Product_type = 'Wedding Ring'}}
              @elseif($data->Product_type == '2')
              <option value="{{$data->Product_type}}">{{ $data->Product_type = 'GIA'}}
              @elseif($data->Product_type == '3')
              <option value="{{$data->Product_type}}">{{ $data->Product_type = 'Liontin'}}
              @elseif($data->Product_type == '4')
              <option value="{{$data->Product_type}}">{{ $data->Product_type = 'Anting'}}
              @elseif($data->Product_type == '5')
              <option value="{{$data->Product_type}}">{{ $data->Product_type = 'Cincin'}}
              @endif
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
              <textarea class="form-control" id="emas_karat" name="emas_karat" rows="2" placeholder="Cincin berlian dengan 18 karat..." >{{$data->emas_karat}}</textarea>
            @if ($errors->has('emas_karat'))
              <span class="text-danger">{{ $errors->first('emas_karat') }}</span>
            @endif
          </div>
          <div class="row">
            <div class="col">
              <label for="berlian">Berlian Yang Dipasang</label>
              <input type="number" class="form-control" id="berlian_karat1" name="berlian_karat1" placeholder="0.0001" step="0.0001" min="0" max="10" value="{{$data->berlian_karat1}}"> <br>
              <input type="number" class="form-control" id="berlian_karat2" name="berlian_karat2" placeholder="0.0001" step="0.0001" min="0" max="10" value="{{$data->berlian_karat2}}"> <br>
              <input type="number" class="form-control" id="berlian_karat3" name="berlian_karat3" placeholder="0.0001" step="0.0001" min="0" max="10" value="{{$data->berlian_karat3}}"> <br>
              <input type="number" class="form-control" id="berlian_karat4" name="berlian_karat4" placeholder="0.0001" step="0.0001" min="0" max="10" value="{{$data->berlian_karat4}}"> <br>

              @if ($errors->has('berlian_karat1'))
                <span class="text-danger">{{ $errors->first('berlian_karat1') }}</span>
              @endif
            </div>
            <div class="col">
              <label for="berlian">Quantity Berlian</label>
              <input type="number" class="form-control" id="quantity_berlian1" name="quantity_berlian1" placeholder="0" step="1" min="0" value="{{$data->quantity_berlian1}}" required> <br>
              <input type="number" class="form-control" id="quantity_berlian2" name="quantity_berlian2" placeholder="0" step="1" min="0" value="{{$data->quantity_berlian2}}"> <br>
              <input type="number" class="form-control" id="quantity_berlian3" name="quantity_berlian3" placeholder="0" step="1" min="0" value="{{$data->quantity_berlian3}}"> <br>
              <input type="number" class="form-control" id="quantity_berlian4" name="quantity_berlian4" placeholder="0" step="1" min="0" value="{{$data->quantity_berlian4}}"> <br>

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