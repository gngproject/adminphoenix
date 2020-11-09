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
                                    <div class="table-responsive">
                                        <table class="table table-bordered no-margin">
                                            <tr>
                                                <th width="30%">Nama Pelanggan/Penerima</th>
                                            <td>{{$result->customer_first_name}} {{$result->customer_last_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Telp</th>
                                                <td>{{$result->customer_phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>{{$result->customer_address}}</td>
                                            </tr>
                                            {{-- <tr>
                                                <th>Order Status</th>
                                                <td>{{$result->payment_status}}</td>
                                            </tr> --}}
                                            @if($result->no_resi == null)
                                            <tr>
                                                <th>Nomor Resi</th>
                                                <td>
                                                    <form action="{{ route('adminmaster.pengiriman.update') }}" method="post">
                                                        @csrf
                                                        <div class="input-group">
                                                            <input type="hidden" name="TransactionID" id="TransactionID" value="{{$result->TransactionID}}">
                                                            <input type="hidden" name="userID" id="userID" value="{{$result->id}}">
                                                            <input type="hidden" name="ProductID" id="ProductID" value="{{$result->ProductID}}">
                                                            <input type="text" name="no_resi" id="no_resi" placeholder="Masukkan Nomor Resi" class="form-control" required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-secondary" type="submit">Kirim</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                            @else
                                                <tr>
                                                    <th>Nomor Resi</th>
                                                    <td>{{$result->no_resi}}</td>
                                                </tr>
                                            @endif
                                        </table>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <h4>Detail Pembayaran</h4>
                                    <div class="table-responsive">
                                         <table class="table table-bordered no-margin">
                                            <tr>
                                                <th width="30%">Nama Pengirim</th>
                                                <td>{{$result->name}}</td>
                                            </tr>
    
                                            <!--<tr>-->
                                            <!--    <th>Bank Tujuan</th>-->
                                            <!--    <td></td>-->
                                            <!--</tr>-->
                                            <tr>
                                                <th>Total</th>
                                                <td>@currency($result->grand_total)</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Transfer</th>
                                                <td>{{ date('d M Y H:i',strtotime($result->created_at)) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                @if($result->status == 1)
                                                <td>Sudah Dibayar, dalam Proses Pengiriman</td>
                                                @else
                                                <td>Belum Dibayar</td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                   
                                </div>
                                <div class="col-md-12">
                                    <h4>Detail Produk</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover no-margin">
                                            <tr>
                                                <th>Produk</th>
                                                <th>Quantity</th>
                                                <th>Harga</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            <tr>
                                                <td>{{$result->Product_Name}}</td>
                                                <td>{{$result->quantity}}</td>
                                                <td>@currency($result->Price)</td>
                                                <td>@currency($result->grand_total)</td>
                                            </tr>
                                    </table>
                                    </div>
                                    
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