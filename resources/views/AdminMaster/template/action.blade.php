<a href="{{ route('adminmaster.productmaster.view', $model) }}" class="btn btn-sm btn-block btn-success">View</a>
<a href="{{ route('adminmaster.productmaster.edit', $model) }}"class="btn btn-sm btn-block btn-warning">Edit</a>
@if($model->status == 1)
    <a href="{{ route('adminmaster.productmaster.status', $model) }}" class="btn btn-sm btn-block btn-danger">Non-Active</a>
@else
    <a href="{{ route('adminmaster.productmaster.status', $model) }}" class="btn btn-sm btn-block btn-primary">Active</a>
@endif