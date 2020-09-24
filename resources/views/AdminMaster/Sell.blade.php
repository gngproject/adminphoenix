@extends('AdminMaster.template.default')

@section('title', 'Data Transaksi')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Transaction Report</h1>
      </div>
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('adminmaster.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Data Transaction</li>
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
            <a href="{{ route('adminmaster.penjualan.show') }}" class="nav-link active">Transaction</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-12">
        <div class="card mt-2">
          <div class="card-header">
            <h3 class="card-title">Master Data Transaction</h3>
          </div>
          <div class="card-body">
            <table id="dataTables" class="table table-bordered table-striped text-center">
              <thead>
              <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Payment Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
              </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @push('scriptsadmintransaction')
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
                    {extend: 'excel', title: 'Transaction Datatables'},
                    {extend: 'print', title: 'Transaction Datatables'},
        ],
        ajax: '{{ route('adminmaster.penjualan.data') }}',
        columns: [
          { data:'TransactionID' },
          { data:'nama' },
          { data:'quantity' },
          { data:'amount', render: $.fn.dataTable.render.number( ',', '.', 0, 'Rp' ) },
          { data:'status' },
          { data:'created_at' },
          { data:'updated_at' },
          { data:'action' },
        ],
      });
    });
  </script>
  @endpush
  @include('sweetalert::alert')
</div>

@endsection