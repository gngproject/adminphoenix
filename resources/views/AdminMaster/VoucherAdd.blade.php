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
      <form role="form" method="POST" action="/admin_master/VoucherAdd">
        {{csrf_field()}}
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
            <div class="input-group-append">
              <input type="text" class="form-control" id="value" name="value">
              <span class="input-group-text">%</span>
            </div>
          </div>
          <div class="form-group">
              <label>Voucher Max in User</label>
              <input type="text" class="form-control" id="voucherMax_user" name="voucherMax_user">
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

@endsection