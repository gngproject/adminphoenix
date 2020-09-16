@extends('AdminMaster.template.default')

@section('title','Detail Pengiriman')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">View Order</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Detail pesanan
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
                                            <th width="30%">Nama Pelanggan/Penerima</th>
                                        <td>{{$result->nama}}</td>
                                        </tr>
                                        <tr>
                                            <th>Telp</th>
                                            <td>{{$result->phone}}</td>
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
                                                @if ($result->status_kirim == 0)
                                                <form action="{{ route('adminmaster.pengiriman.update') }}" method="post">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="hidden" name="TransactionID" id="TransactionID" value="{{$result->TransactionID}}">
                                                        <input type="hidden" name="userID" id="userID" value="{{$result->userID}}">
                                                        <input type="hidden" name="ProductID" id="ProductID" value="{{$result->ProductID}}">
                                                        <input type="text" name="no_resi" id="no_resi" placeholder="Masukkan Nomor Resi" class="form-control" required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary" type="submit">Kirim</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                @else
                                                {{ $result->no_resi }}
                                                @endif
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
                                            <td>@currency($result->amount)</td>
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
                                            <td>@currency($result->amount)</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection