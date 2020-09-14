@extends('AdminMaster.template.default')

@section('title', 'Data Customize Product')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Product Special Report</h1>
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

{{-- <div class="modal fade" id="modalMdshow">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ShowModalTitle">Modal Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          @csrf
          <div class="form-group">
            <div class="input-group-prepend">
              <span class=" input-group-text">ID Item</span>
            </div>
            <input type="text" class="form-control" id="productID_view" readonly>
          </div>
          <div class="form-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Product Name</span>
            </div>
            <input type="text" class="form-control" id="Product_Name" readonly>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> --}}

@endsection