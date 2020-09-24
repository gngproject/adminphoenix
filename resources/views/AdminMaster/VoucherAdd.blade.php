@extends('AdminMaster.template.default')

@section('title', 'Voucher Add')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Add Voucher</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin_master">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin_master/VoucherShow">All Voucher</a></li>
          <li class="breadcrumb-item active">Add Voucher</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form role="form" method="POST" action="/admin_master/VoucherAdd" id="voucheradd">
        @csrf
        @method('POST')
        <div class="card-body">
          <div class="form-group">
              <label for="productID_view">ID Voucher</label>
              <input type="text" class="form-control" id="voucherID_view" name="voucherID_view" required>
          </div>
          <div class="form-group">
              <label for="Price">Code Voucher</label>
              <input type="text" class="form-control" id="voucherCode" name="voucherCode" required>
          </div>
          <div class="form-group">
              <label>Type Voucher</label>
              <input type="text" class="form-control" id="type" name="type" required>
          </div>
          <div class="form-group">
            <label>Voucher with Percent</label>
              <input type="text" class="form-control" id="value" name="value" placeholder="%">
          </div>
          <div class="form-group">
              <label>Voucher Max in User</label>
              <input type="number" class="form-control" id="voucherMax_user" name="voucherMax_user">
          </div>
        </div>
    </div>
    <div class="col-md-12">
      <button type="submit" onclick="return confirm('Are you sure this data voucher ?')"
        class="btn-block btn-flat btn-primary">SUBMIT</button>
    </div>
  </form>
 </div>
</div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

<script type="text/javascript">
  if($("#voucheradd").length > 0) {
    $("#voucheradd").validate({
    rules: {
      voucherID_view: {
        required: true,
        minlength:3,
        maxlength: 10,
      },
      voucherCode: {
        required: true,
        maxlength:50,
      },
      type: {
        required: true,
      },
      value: {
        required: true,
      },
    },

    messages: {
      voucherID_view: {
        required: "<span class='text-danger'>Please enter id voucher</span>",
        minlength: "<span class='text-danger'>The code should be 3 characters</span> ",
        maxlength: "<span class='text-danger'>Your code maxlength should be 15 characters long.</span>",
      },
      voucherCode: {
        required: "<span class='text-danger'>Please enter code voucher.</span>",
        maxlength: "<span class='text-danger'>The name should less than or equal to 20 characters.</span>",
      },
      type: {
        required: "<span class='text-danger'>Please enter type voucher (ex: Discount)</span>",
      },
      value: {
        required: "<span class='text-danger'>Please enter value (ex:-10%)</span> ",
      },
    },
    })
  }
</script>

@endsection