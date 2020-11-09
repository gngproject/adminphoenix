@extends('AdminMaster.template.default')

@section('title', 'Customize Product')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Customize Product</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin_master">Home</a></li>
          <li class="breadcrumb-item active">Data Customize Product</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<div class="row">
  <div class="col-12">
    <div class="card mt-2">
      <div class="card-header">
        <h3 class="card-title">Data Customize Product</h3>
      </div>
      <div class="card-body">
        <table id="dataTables" class="table table-bordered table-striped text-center">
          <thead>
          <tr>
            <th>ID</th>
            <th>Nama Customer</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Kebutuhan</th>
            <th>Referensi</th>
            <th>Info Tambahan</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

@push('scriptsadminmastercustomize')
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
                    {extend: 'excel', title: 'User Datatables'},
                    {extend: 'print', title: 'User Datatables'},
        ],
        ajax: '{{ route('adminmaster.productmaster.customizedata') }}',
        columns: [
          { data:"id" },
          { data:"nama"},
          { data:'contact'},
          { data:'email'},
          { data:'kebutuhan' },
          { data:'referensi'},
          { data:'infotmbh'},
          { data:'created_at'},
          { data:'updated_at'},
          { data:'status'},
          { data:'action' }
        ]
      });
    });
  </script>
@endpush

@include('sweetalert::alert')

@endsection