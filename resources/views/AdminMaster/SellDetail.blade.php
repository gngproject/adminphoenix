@extends('AdminMaster.template.default')

@section('title', 'Detail Transaksi')

@section('content')

<main class="main">
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
              <a href="#" class="nav-link">Trash</a>
            </li>
          </ul>
        </div>
    </nav>
    <br/>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Detail Transaction
                                <div class="float-right">
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($result as $result)
                                <!-- BLOCK UNTUK MENAMPILKAN DATA PELANGGAN -->
                                <div class="col-md-6">
                                    <h4>Detail Pelanggan</h4>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Nama Pelanggan</th>
                                            <td>{{$result->nama_penerima}}</td>
                                        </tr>
                                        <tr>
                                            <th>Telp</th>
                                            <td>{{$result->telp}}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{$result->alamat}}</td>
                                        </tr>
                                        {{-- <tr>
                                            <th>Order Status</th>
                                            <td>{{$result->status}}</td>
                                        </tr> --}}
                                        <tr>
                                            <th>Nomor Resi</th>
                                            <td>
                                                {{ $result->tracking_number }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h4>Detail Pembayaran</h4>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Nama Pengirim</th>
                                            <td>{{$result->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Bank Tujuan</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>@currency($result->newtotal)</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Transfer</th>
                                            <td>{{ date('d M Y H:i',strtotime($result->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{$result->status}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                    <h4>Detail Produk</h4>
                                    <table class="table table-borderd table-hover">
                                        <tr>
                                            <th>Produk</th>
                                            <th>Quantity</th>
                                            <th>Harga</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        <tr>
                                            <td>{{$result->Product_Name}}</td>
                                            <td>{{$result->quantity}}</td>
                                            <td>@currency($result->price)</td>
                                            <td>@currency($result->newtotal)</td>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection