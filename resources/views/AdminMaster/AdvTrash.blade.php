@extends('AdminMaster.template.default')

@section('title', 'Data Non-Active Voucher')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Advertisement Report</h1>
      </div>
      <div class="col-sm-12">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('adminmaster.advertise.show') }}">Advertise</a></li>
          <li class="breadcrumb-item active">Non-Active Advertise</li>
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
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('adminmaster.advertise.show') }}" class="nav-link">Active Advertise</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('adminmaster.advertise.shownonactive') }}" class="nav-link active">Non-Active Advertise</a>
          </li>
        </ul>
      </div>
    </nav>
    <!---------------------- ADVERTISMENT NON ACTIVE  ------------------------------------------------------>
    <div class="row">
      <div class="col-12">
        <div class="card mt-2">
          <div class="card-header">
            <div class="row">
                <h3 class="card-title col-md-10 col-sm-12 my-2 ">Non-Active Data Advertise</h3>
                <div class="col-md-2 col-sm-12 ml-auto">
                  <button type="button" onclick="location.href='{{ route('adminmaster.advertise.form') }}'" class="btn btn-sm btn-block btn-primary"><i class="fas fa-plus m-2"></i>Tambah Advertise</button>
                </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table id="dataTables" class="table table-bordered table-striped text-center no-margin">
                    <thead>
                          <tr>
                            <th>ID Advertise</th>
                            <th>Advertise Name</th>
                            <th>Advertise Description</th>
                            <th>Advertise Image</th>
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
    @push('scriptsadminadvertiseadvert')
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
                    {extend: 'excel', title: 'Data Non Active Advertisement Datatables'},
                    {extend: 'print', title: 'Data Non Active Advertisement Datatables'},
        ],
        ajax: '{{ route('adminmaster.advertise.nonactive') }}',
        columns: [
          { data:'advertiseID_view' },
          { data:'advertise_name' },
          { data:'advertise_description' },
          { data:'advertise_img' },
          { data:'created_at' },
          { data:'updated_at' },
          { data:'status' },
          { data:'actionadvertise' },
        ],
      });
    });
    </script>
    @endpush
  </div>
</div>

@include('sweetalert::alert')

@endsection