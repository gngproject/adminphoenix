<a href="{{ route('adminmaster.voucher.edit', $model) }}"class="btn btn-sm btn-block btn-warning">Edit</a>
{{-- <a href="{{ route('adminbarang.product.view', $model) }}" class="btn btn-sm btn-block btn-success">View</a> --}}
@if($model->status == 1)
    <a href="{{ route('adminmaster.voucher.status', $model) }}" class="btn btn-sm btn-block btn-danger">Non-Active</a>
@else
    <a href="{{ route('adminmaster.voucher.status', $model) }}" class="btn btn-sm btn-block btn-primary">Active</a>
@endif