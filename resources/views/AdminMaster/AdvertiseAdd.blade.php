@extends ('AdminMaster.template.default')

@section('title', 'Advertisment Added')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Form Add Advertise</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin_master">Home</a></li>
          <li class="breadcrumb-item"><a href="/admin_master/AdvertShow">All Advertisment</a></li>
          <li class="breadcrumb-item active">Add Advertise</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <form method="POST" action="{{ route('adminmaster.advertise.add') }}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="advertiseID_view">Advertise ID</label>
        <input type="text" class="form-control @error('advertiseID_view') is-invalid @enderror" id="advertiseID_view" name="advertiseID_view" value="{{old('advertiseID_view')}}">
              @error('advertiseID_view')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
        <div class="form-group">
            <label for="advertise_name">Advertise Title</label>
            <input type="text" class="form-control @error('advertise_name') is-invalid @enderror" id="advertise_name" name="advertise_name" >
            @error('advertise_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
  
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" id="advertise_description" name="advertise_description" >
        </div>
        <div class="form-group">
            <label for="advertise_img">Advertise Image</label>
              <input type="file" class="form-control" id="advertise_img" name="advertise_img">
              @if ($errors->has('advertise_img'))
                <span class="text-danger">{{ $errors->first('advertise_img') }}</span>
              @endif
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <button type="submit" value="submit" class="btn-block btn-flat btn-primary" onclick="return confirm('Are you sure this data ?')">SUBMIT</button>
    </div>
  </form>
 </div>
</div>
@endsection