@extends('AdminBarang.template.default')

@section('title', 'Home - Admin Product')

@section('content')
<br/>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 class="text-center">{{$products}}</h3>
                    <p class="text-center">All Product</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 class="text-center">{{$status_active_product}}</h3>
                    <p class="text-center">Product Active</p>
                </div>
                <div class="icon">
                    <i class="ion ion-play"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3 class="text-center">{{$status_nonact_product}}</h3>
                    <p class="text-center">Product Non Actice</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stop"></i>
                </div>
            </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>
@endsection