@extends('AdminMaster.template.default')

@section('title', 'Voucher Edit')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Edit Voucher</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin_master">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin_master/VoucherShow">All Voucher</a></li>
          <li class="breadcrumb-item active">Edit Voucher</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="row">
      <div class="col-md-12">
        <form role="form" method="POST" action="{{ route ('adminmaster.voucher.update', $result->voucherID) }}" enctype="multipart/form-data">
            @csrf
            @method("POST")
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" class="form-control" id="voucherID" name="voucherID" value="{{ $result->voucherID }}" required>
              </div>
              <div class="form-group">
                  <label for="voucherID_view">ID Voucher</label>
                  <input type="text" class="form-control" id="voucherID_view" name="voucherID_view" value="{{ $result->voucherID_view }}" readonly>
              </div>
              <div class="form-group">
                <label for="Price">Code Voucher</label>
                <input type="text" class="form-control" id="voucherCode" name="voucherCode" value="{{ $result->voucherCode }}" required>
              </div>
              <div class="form-group">
                <label>Type Voucher</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ $result->type }}" required>
              </div>
              <div class="form-group">
                <label>Voucher with Percent</label>
                <div class="input-group-append">
                  <input type="text" class="form-control" id="voucherPercent" name="voucherPercent" value="{{ $result->voucherPercent }}">
                  <span class="input-group-text">%</span>
                </div>
              </div>
              <div class="form-group">
                <label>Voucher With Nominal</label>
                  <div class="input-group-append">
                    <input type="text" class="form-control" id="voucherDiscount" name="voucherDiscount" value="{{ $result->voucherDiscount }}">
                  </div>
              </div>
              <div class="form-group">
                <label>Voucher Max in User</label>
                <input type="text" class="form-control" id="voucherMax_user" name="voucherMax_user" value="{{ $result->voucherMax_user }}">
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" value="Submit" onclick="return confirm('Are you sure this data voucher ?')" class="btn-block btn-flat btn-primary">SUBMIT</button>
            </div>
        </form>
      </div>
  </div>
</div>

@include('sweetalert::alert')

@endsection