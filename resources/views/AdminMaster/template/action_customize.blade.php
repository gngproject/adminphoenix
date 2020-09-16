@if($model->status == 0)
    <a href="{{ route('adminmaster.customizeproduct.status', $model) }}" class="btn btn-sm btn-block btn-danger">In Progress</a>
@elseif($model->status == 1)
    <a href="{{ route('adminmaster.customizeproduct.status', $model) }}" class="btn btn-sm btn-block btn-warning">Waiting...</a>
@else
    <a href="{{ route('adminmaster.customizeproduct.status', $model) }}" class="btn btn-sm btn-block btn-primary disabled">Done</a>
@endif