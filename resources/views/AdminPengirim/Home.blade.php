@extends('AdminPengirim.template.default')


@section('title', 'Home - Admin Pengiriman')

@section('content')
<br/>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 class="text-center">{{$status_new}}</h3>
                    <p class="text-center">New Order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-information"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3 class="text-center">{{$status_shipping}}</h3>
                    <p class="text-center">Shipping</p>
                </div>
                <div class="icon">
                    <i class="ion ion-navigate"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 class="text-center">{{$status_done}}</h3>
                    <p class="text-center">Done</p>
                </div>
                <div class="icon">
                    <i class="ion ion-happy"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>
@endsection
