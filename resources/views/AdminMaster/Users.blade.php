@extends ('AdminMaster.template.default')

@section('title', 'Users')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Users Report</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin_master">Home</a></li>
          <li class="breadcrumb-item active">Data Users</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<div class="row">
  <div class="col-12">
    <div class="card mt-2">
      <div class="card-header">
        <h3 class="card-title">Data Users Registrasi</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table id="dataTables" class="table table-bordered table-striped text-center">
                <thead>
                  <tr>
                    <th>ID User</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Photo </th>
                    <th>Photo KTP</th>
                    <th>Created</th>
                    <th>Updated</th>
                  </tr>
                </thead>
            </table>
        </div>
        
      </div>
    </div>
  </div>
</div>
@push('scriptsadminusers')
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
        ajax: '{{ route('adminmaster.users.data') }}',
        columns: [
          { data:'userID' },
          { data:'name' },
          { data:'email' },
          { data:'telp' },
          { data:'photo'},
          { data:'photoktp' },
          { data:'created_at' },
          { data:'updated_at' },
        ],
      });
    });
  </script>
@endpush

@include('sweetalert::alert')

@endsection