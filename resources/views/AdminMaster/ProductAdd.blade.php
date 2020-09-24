@extends('AdminMaster.template.default')

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
          <li class="breadcrumb-item"><a href="{{ route('adminmaster.productmaster.show') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('adminmaster.productmaster.data') }}">Product All</a></li>
          <li class="breadcrumb-item active">Add Product</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form id="productadd" action="{{ route('adminmaster.product.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="card-body">
          <div class="form-group">
            <label for="productID_view">Product ID</label>
            <input type="text" class="form-control" id="productID_view" name="productID_view">
              <span class="text-danger">{{ $errors->first('productID_view') }}</span>
          </div>
          <div class="form-group">
            <label for="Product_Name">Product Name</label>
            <input type="text" class="form-control" id="Product_Name" name="Product_Name">
              <span class="text-danger">{{ $errors->first('Product_Name') }}</span>
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
              <span class="text-danger">{{ $errors->first('Price') }}</span>
          </div>
          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" class="form-control" id="stock" name="stock">
              <span class="text-danger">{{ $errors->first('stock') }}</span>
          </div>
          <div class="form-group">
            <label for="Weight">Weight</label>
            <input type="text" class="form-control" id="weight" name="weight">
              <span class="text-danger">{{ $errors->first('weight') }}</span>
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
              <span class="text-danger">{{ $errors->first('emas_karat') }}</span>
          </div>
          <div class="row">
            <div class="col">
              <label for="berlian">Berlian Yang Dipasang</label>
              <input type="number" class="form-control" id="berlian_karat1" name="berlian_karat1" placeholder="0.0001" step="0.0001" min="0" max="10"> <br>
                <span class="text-danger">{{ $errors->first('berlian_karat1') }}</span>
              <input type="number" class="form-control" id="berlian_karat2" name="berlian_karat2" placeholder="0.0001" step="0.0001" min="0" max="10"> <br>
                <span class="text-danger">{{ $errors->first('berlian_karat2') }}</span>
              <input type="number" class="form-control" id="berlian_karat3" name="berlian_karat3" placeholder="0.0001" step="0.0001" min="0" max="10"> <br>
                <span class="text-danger">{{ $errors->first('berlian_karat3') }}</span>
              <input type="number" class="form-control" id="berlian_karat4" name="berlian_karat4" placeholder="0.0001" step="0.0001" min="0" max="10"> <br>
                <span class="text-danger">{{ $errors->first('berlian_karat4') }}</span>
            </div>
            <div class="col">
              <label for="berlian">Quantity Berlian</label>
              <input type="number" class="form-control" id="quantity_berlian1" name="quantity_berlian1" placeholder="0" step="1" min="0"> <br>
                <span class="text-danger">{{ $errors->first('quantity_berlian1') }}</span>
              <input type="number" class="form-control" id="quantity_berlian2" name="quantity_berlian2" placeholder="0" step="1" min="0"> <br>
                <span class="text-danger">{{ $errors->first('quantity_berlian2') }}</span>
              <input type="number" class="form-control" id="quantity_berlian3" name="quantity_berlian3" placeholder="0" step="1" min="0"> <br>
                <span class="text-danger">{{ $errors->first('quantity_berlian3') }}</span>
              <input type="number" class="form-control" id="quantity_berlian4" name="quantity_berlian4" placeholder="0" step="1" min="0"> <br>
                <span class="text-danger">{{ $errors->first('quantity_berlian4') }}</span>
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
                <span class="text-danger">{{ $errors->first('Product_img_1') }}</span>
          </div>
          <div class="form-group">
            <label for="Product_img_2">Product Image 2</label>
              <input type="file" class="form-control" id="Product_img_2" name="Product_img_2">
                <span class="text-danger">{{ $errors->first('Product_img_2') }}</span>
          </div>
          <div class="form-group">
            <label for="Product_img_3">Product Image 3</label>
              <input type="file" class="form-control" id="Product_img_3" name="Product_img_3">
                <span class="text-danger">{{ $errors->first('Product_img_3') }}</span>
          </div>
          <div class="form-group">
            <label for="Product_img_4">Product Image 4</label>
              <input type="file" class="form-control" id="Product_img_4" name="Product_img_4">
                <span class="text-danger">{{ $errors->first('Product_img_4') }}</span>
          </div>
          <div class="form-group">
            <label for="Product_img_5">Product Image 5</label>
              <input type="file" class="form-control" id="Product_img_5" name="Product_img_5" accept=".png, .jpg, .jpeg">
                <span class="text-danger">{{ $errors->first('Product_img_5') }}</span>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

<script type="text/javascript">
  $(function(){
    $('#Product_img_1').change(function(){
      if(Math.round(this.files[0].size/(1024*1024)) > 2) {
        alert('Please select image size less than 2 MB');
        this.value = "";
        } else {
        alert('success');
      }
    });
  });

  $(function(){
    $('#Product_img_2').change(function(){
      if(Math.round(this.files[0].size/(1024*1024)) > 2) {
        alert('Please select image size less than 2 MB');
        this.value = "";
        } else {
        alert('success');
      }
    });
  });

  $(function(){
    $('#Product_img_3').change(function(){
      if(Math.round(this.files[0].size/(1024*1024)) > 2) {
        alert('Please select image size less than 2 MB');
        this.value = "";
        } else {
        alert('success');
      }
    });
  });

  $(function(){
    $('#Product_img_4').change(function(){
      if(Math.round(this.files[0].size/(1024*1024)) > 2) {
        alert('Please select image size less than 2 MB');
        this.value = "";
        } else {
        alert('success');
      }
    });
  });

  $(function(){
    $('#Product_img_5').change(function(){
      if(Math.round(this.files[0].size/(1024*1024)) > 2) {
        alert('Please select image size less than 2 MB');
        this.value = "";
        } else {
        alert('success');
      }
    });
  });
</script>

<script type="text/javascript">
if($("#productadd").length > 0) {
  $("#productadd").validate({
  rules: {
    productID_view: {
      required: true,
      minlength:3,
      maxlength: 10,
    },
    Product_Name: {
      required: true,
      maxlength:50,
    },
    Price: {
      required: true,
      digits:true,
      minlength:6,
      maxlength:12,
    },
    stock: {
      required: true,
      digits:true,
      minlength:1,
    },
    weight: {
      required: true,
      minlength:1,
    },
  },

  messages: {
    productID_view: {
      required: "<span class='text-danger'>Please enter code product</span>",
      minlength: "<span class='text-danger'>The code should be 3 characters</span> ",
      maxlength: "<span class='text-danger'>Your code maxlength should be 10 characters long.</span>",
    },
    Product_Name: {
      required: "<span class='text-danger'>Please enter product name.</span>",
      maxlength: "<span class='text-danger'>The name should less than or equal to 50 characters.</span>",
    },
    Price: {
      required: "<span class='text-danger'>Please enter price</span>",
      minlength: "<span class='text-danger'>price should be 10 digits</span> ",
      digits: "<span class='text-danger'>Please enter only numbers</span>",
      maxlength: "<span class='text-danger'>price should be 12 digits</span> ",
    },
    stock: {
      required: "<span class='text-danger'>Please enter stock</span> ",
      digits: "<span class='text-danger'>Please enter only numbers</span>",
      minlength: "<span class='text-danger'>stock should be 1</span> ",
    },
    weight: {
      required: "<span class='text-danger'>Please enter weight</span> ",
      minlength: "<span class='text-danger'>weight should be 1 digits</span> ",
    },
  },
  })
}
</script>
@endsection