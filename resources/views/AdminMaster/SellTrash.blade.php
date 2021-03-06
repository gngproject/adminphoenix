@extends('AdminMaster.template.default')

@section('title', 'Data Trash')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Trash</h1>
        </div>
        <div class="col-sm-12">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin_master">Home</a></li>
            <li class="breadcrumb-item active">Trash</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand navbar-light">
                <div class="card-header p-1">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                        <a href="/admin_master/Sell/show" class="nav-link">Transaction</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                        <a href="/admin_master/Selltrash" class="nav-link">Trash</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Transaction</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table class="table table-bordered">
                    <div class="mb-3">
                    {{-- <button type="button" onclick="location.href='{{ url('/admin_master/AdvertiseAddView') }}'" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Advertise</button> --}}
                    </div>
                    <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>ID Transaksi</th>
                        <th>Nama Pembeli</th>
                        <th>Nama Product</th>
                        <th>Jumlah</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Deleted at</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($t as $s)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td><span class="badge badge-secondary" style="font-size: medium">{{$s->ID_payment}}</span></td>
                        <td>{{$s->nama_penerima}}</td>
                        <td>{{$s->name}}</td>
                        <td>{{$s->quantity}}</td>
                        <td>{{ date('d M Y H:i',strtotime($s->created_at)) }}</td>
                        <td>{{ date('d M Y H:i',strtotime($s->updated_at)) }}</td>
                        <td>{{ date('d M Y H:i',strtotime($s->deleted_at)) }}</td>
                        <td>
                        <a href="/admin_master/Sell/{{ $s->id }}/detail" class="btn btn-primary">
                            <i class="fa fa-info-circle"></i>
                        </a>
                        </td>
                        <td>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure delete this ?')"
                            href="#">
                            <i class="fa fa-trash"></i>
                        </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection