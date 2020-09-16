@extends('AdminMaster.template.default')

@section('title', 'Home - Admin Master')

@section('content')
<br/>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-6">
      <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
          <h3 class="text-center">{{$products}}</h3>
          <p class="text-center">My Product</p>
          </div>
          <div class="icon">
          <i class="ion ion-bag"></i>
          </div>
          <a href="/admin_master/ProductShow" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
          <h3 class="text-center">{{$user}}</h3>
          <p class="text-center">User Registrations</p>
          </div>
          <div class="icon">
          <i class="ion ion-person-add"></i>
          </div>
          <a href="/admin_master/UserShow" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-6 col-6">
      <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
          <h3 class="text-center">{{$transaction}}</h3>
          <p class="text-center">All Transaction</p>
          </div>
          <div class="icon">
          <i class="ion ion-pie-graph"></i>
          </div>
          <a href="/admin_master/Sell/show" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-6 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3 class="text-center">@currency ($total)</h3>
            <p class="text-center">Income</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
        </div>
      </div>
      <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            <h3 class="text-center">4</h3>
            <p class="text-center">All Pengiriman</p>
          </div>
          <div class="icon">
            <i class="ion-ios-box"></i>
          </div>
          <a href="/admin_master/Pengiriman" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
  </div>
</section>
@endsection