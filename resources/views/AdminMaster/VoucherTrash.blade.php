@extends('AdminMaster.template.default')

@section('title', 'Data Non-Active Voucher')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Voucher Report</h1>
      </div>
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('adminmaster.voucher.show') }}">Voucher</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('adminmaster.voucher.shownonactive') }}">Non-Active Voucher</a></li>
        </ol>
      </div>
    </div>
  </div>
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
            <a href="/admin_master/VoucherShow" class="nav-link">Voucher</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/admin_master/VoucherTrash" class="nav-link active">Non Active</a>
          </li>
        </ul>
      </div>
    </nav>
    <!---------------------- REPORT VOUCHER  ------------------------------------------------------>
    <div class="row">
      <div class="col-12">
        <div class="card mt-2">
          <div class="card-header">
            <h3 class="card-title">Data Non Active Voucher</h3>
          </div>
          <div class="card-body">
            <table id="dataTables" class="table table-bordered table-striped text-center">
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
    @push('scriptsadminnonactivevoucher')
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
                    {extend: 'excel', title: 'Data Non Active Voucher Datatables'},
                    {extend: 'print', title: 'Data Non Active Voucher Datatables'},
        ],
        ajax: '{{ route('adminmaster.voucher.nonactive') }}',
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
  </div>
</div>
@endsection