@extends('AdminBarang.template.default')

@section('title', 'Data Product')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mt-2">
      <div class="card-header">
        <h3 class="card-title">Tabel Product</h3>
      </div>
      <div class="card-body">
        <table id="dataTables" class="table table-bordered table-striped text-center">
          <div class="row mb-2">
            <div class="col-2">
              <button type="button" onclick="location.href='{{ route('adminbarang.product.form') }}'" class="btn btn-sm btn-block btn-primary">Tambah Product</button>
            </div>
          </div>
          <thead>
          <tr>
            <th>ID Product</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Image 1</th>
            <th>Image 2</th>
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

@push('scripts')
  <script type="text/javascript">
    $(function() {
      $('#dataTables').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('adminbarang.product.data') }}',
        columns: [
          { data:"productID_view" },
          { data:"Product_Name"},
          { data:'description'},
          { data:'quantity'},
          { data:'Product_img_1'},
          { data:'Product_img_2'},
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