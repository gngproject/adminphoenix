@extends('AdminMaster.template.default')

@section('title', 'Detail Product')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Product - {{$view->Product_Name}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('adminmaster.productmaster.show') }}">Product All</a></li>
                <li class="breadcrumb-item active">Detail Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Products</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Product Image 1</span>
                      <span class="info-box-number text-center text-muted mb-0" style="height: 100px">
                        <img style="height: 100px" src="http://localhost:8000/{{$view->Product_img_1}}">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Product Image 2</span>
                      <span class="info-box-number text-center text-muted mb-0" style="height: 100px">
                        <img style="height: 100px" src="http://localhost:8000/{{$view->Product_img_2}}">
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Product Image 3</span>
                      <span class="info-box-number text-center text-muted mb-0" style="height: 100px">
                        <img style="height: 100px" src="http://localhost:8000/{{$view->Product_img_3}}">
                      <span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Product Image 4</span>
                        <span class="info-box-number text-center text-muted mb-0" style="height: 100px">
                          <img style="height: 100px" src="http://localhost:8000/{{$view->Product_img_4}}">
                        <span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Product Image 5</span>
                        <span class="info-box-number text-center text-muted mb-0" style="height: 100px">
                          <img style="height: 100px" src="http://localhost:8000/{{$view->Product_img_5}}">
                        <span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fa fa-paint-brush"></i> Description</h3>
                <p class="text-muted">{{$view->description}}
                </p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Type
                  <b class="d-block">
                    @if($view->Product_type == '0')
                      {{ $view->Product_type = 'Diamond Ring' }}
                    @elseif($view->Product_type == '1')
                      {{ $view->Product_type = 'Wedding Ring'}}
                    @elseif($view->Product_type == '2')
                      {{ $view->Product_type = 'GIA'}}
                    @elseif($view->Product_type == '3')
                      {{ $view->Product_type = 'Liontin'}}
                    @elseif($view->Product_type == '4')
                      {{ $view->Product_type = 'Anting'}}
                    @elseif($view->Product_type == '5')
                      {{ $view->Product_type = 'Cincin'}}
                    @endif
                  </b>
                </p>
                <p class="text-sm">Gender
                  <b class="d-block">
                    @if($view->Gender == '3' )
                      {{ $view->Gender = 'Anak-Anak' }}
                    @elseif($view->Gender == '2')
                      {{$view->Gender = 'Universal'}}
                    @elseif($view->Gender == '1')
                      {{$view->Gender = 'Pria'}}
                    @elseif($view->Gender == '0')
                      {{ $view->Gender = 'Wanita' }}
                    @endif
                  </b>
                </p>
                <p class="text-sm">Quantity
                  <b class="d-block">{{$view->quantity}}</b>
                </p>
                <p class="text-sm">Price
                  <b class="d-block">@currency ($view->Price)</b>
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection