@extends('AdminBarang.template.default')

@section('title', 'Detail Product')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Product - {{$views->Product_Name}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('adminbarang.product.show') }}">Product All</a></li>
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
                        <img style="height: 100px" src="http://adminphoenixjewellery.com/{{$views->Product_img_1}}">
                      </span>
                    </div>
                  </div>
                </div>
                @if($views->Product_img_2 != null)
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Product Image 2</span>
                      <span class="info-box-number text-center text-muted mb-0" style="height: 100px">
                        <img style="height: 100px" src="http://adminphoenixjewellery.com/{{$views->Product_img_2}}">
                      </span>
                    </div>
                  </div>
                </div>
                @endif
                @if($views->Product_img_3 != null)
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Product Image 3</span>
                      <span class="info-box-number text-center text-muted mb-0" style="height: 100px">
                        <img style="height: 100px" src="http://adminphoenixjewellery.com/{{$views->Product_img_3}}">
                      <span>
                    </div>
                  </div>
                </div>
                @endif
                @if($views->Product_img_4 != null)
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Product Image 4</span>
                        <span class="info-box-number text-center text-muted mb-0" style="height: 100px">
                          <img style="height: 100px" src="http://adminphoenixjewellery.com/{{$views->Product_img_4}}">
                        <span>
                    </div>
                  </div>
                </div>
                @endif
                @if($views->Product_img_5 != null)
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Product Image 5</span>
                        <span class="info-box-number text-center text-muted mb-0" style="height: 100px">
                          <img style="height: 100px" src="http://adminphoenixjewellery.com/{{$views->Product_img_5}}">
                        <span>
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fa fa-paint-brush"></i> Details</h3>

              <br>
              <div class="text-muted">
                <p>
                  <p class="text-sm">Gold Type
                    <b class="d-block">
                     {{$views->emas_karat}}
                    </b>
                  </p>
                </p>
                <p class="text-sm">Category
                  <b class="d-block">
                    @if($views->Product_type == '0')
                      {{ $views->Product_type = 'Diamond Ring' }}
                    @elseif($views->Product_type == '1')
                      {{ $views->Product_type = 'Wedding Ring'}}
                    @elseif($views->Product_type == '2')
                      {{ $views->Product_type = 'GIA'}}
                    @elseif($views->Product_type == '3')
                      {{ $views->Product_type = 'Liontin'}}
                    @elseif($views->Product_type == '4')
                      {{ $views->Product_type = 'Anting'}}
                    @elseif($views->Product_type == '5')
                      {{ $views->Product_type = 'Cincin'}}
                    @endif
                  </b>
                </p>
                <p class="text-sm">Diamond
                  <b class="d-block">
                    @if($views->berlian_karat1 != 0.0000)
                      {{ $views->berlian_karat1}} Carats x {{ $views->quantity_berlian1}}
                    @endif

                    @if($views->berlian_karat2 != 0.0000)
                    <br>
                    {{ $views->berlian_karat2}} Carats x {{ $views->quantity_berlian2}}
                    @endif
                    @if($views->berlian_karat3 != 0.0000)
                    <br>
                    {{ $views->berlian_karat3}} Carats x {{ $views->quantity_berlian3}}
                    @endif
                    @if($views->berlian_karat4 != 0.0000)
                    <br>
                    {{ $views->berlian_karat4}} Carats x {{ $views->quantity_berlian4}}
                    @endif

                  </b>
                </p>
                <p class="text-sm">Color & Clarity
                  <b class="d-block">
                    @foreach ($gettype as $item)

                    {{$item->colour}} & {{$item->clarity}}
                    @endforeach

                  </b>
                </p>
                <p class="text-sm">Gender
                  <b class="d-block">
                    @if($views->Gender == '3' )
                      {{ $views->Gender = 'Anak-Anak' }}
                    @elseif($views->Gender == '2')
                      {{$views->Gender = 'Universal'}}
                    @elseif($views->Gender == '1')
                      {{$views->Gender = 'Pria'}}
                    @elseif($views->Gender == '0')
                      {{ $views->Gender = 'Wanita' }}
                    @endif
                  </b>
                </p>
                <p class="text-sm">Stock
                  <b class="d-block">{{$views->stock}}</b>
                </p>
                <p class="text-sm">Price
                  <b class="d-block">@currency ($views->Price)</b>
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