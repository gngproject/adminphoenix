@extends('AdminMaster.template.default')

@section('title', 'Voucher')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Voucher Report</h1>
      </div>
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('adminmaster.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Voucher</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<div class="row">
  <div class="col-md-12">
    <nav class="navbar navbar-expand navbar-light">
      <div class="card-header p-1">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('adminmaster.voucher.show') }}" class="nav-link active">Voucher</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('adminmaster.voucher.shownonactive') }}" class="nav-link">Non Active</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-12">
        <div class="card mt-2">
          <div class="card-header">
            <h3 class="card-title">Master Data Voucher</h3>
          </div>
          <div class="card-body">
            <table id="dataTables" class="table table-bordered table-striped text-center">
              <div class="row mb-2">
                <div class="col-2">
                  <button type="button" onclick="location.href='{{ route('adminmaster.voucher.add') }}'" class="btn btn-sm btn-block btn-primary">Tambah Voucher</button>
                </div>
              </div>
              <thead>
              <tr>
                <th>ID Voucher</th>
                <th>Code Voucher</th>
                <th>Tipe Voucher</th>
                <th>Value Voucher</th>
                <th>Voucher Max User</th>
                <th>Created</th>
                <th>Updated</th>
                <th>status</th>
                <th>Action</th>
              </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scriptsadminvoucher')
  <script type="text/javascript">
    $(function() {
      $('#dataTables').DataTable({
        processing: true,
        serverSide: true,
        dom: '<"html5buttons">Blfrtip',
        language: {
                buttons: {
                    colvis : 'show / hide', // label button show/hide
                    colvisRestore: "Reset Kolom" //label untuk reset kolom ke default
                  }
        },
        buttons : [
                    {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    {extend: 'excel', title: 'Vouchers Datatables'},
                    {extend: 'print', title: 'Vouchers Datatables'},
        ],
        ajax: '{{ route('adminmaster.voucher.data') }}',
        columns: [
          { data:'voucherID_view' },
          { data:'voucherCode' },
          { data:'type' },
          { data:'value' },
          { data:'voucherMax_user' },
          { data:'created_at' },
          { data:'updated_at' },
          { data:'status' },
          { data:'actionvoucher' },
        ],
      });
    });
  </script>
  @endpush

@include('sweetalert::alert')

</div>

@endsection