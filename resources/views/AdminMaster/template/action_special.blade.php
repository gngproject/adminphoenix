{{-- <a href="{{ route('adminmaster.advertise.edit', $model) }}"class="btn btn-sm btn-block btn-warning">Edit</a> --}}
{{-- <a href="{{ route('adminbarang.product.view', $model) }}" class="btn btn-sm btn-block btn-success">View</a> --}}
@if($model->status == 0)
    <a href="{{ route('adminmaster.productspecial.status', $model) }}" class="btn btn-sm btn-block btn-danger">In Progress</a>
@else
    <a href="{{ route('adminmaster.productspecial.status', $model) }}" class="btn btn-sm btn-block btn-primary">Done</a>
@endif