@if($model->status == 0)
    <a href="{{ route('adminmaster.order.status', $model) }}" class="btn btn-sm btn-block btn-danger">Unpaid</a>
@else
    <a href="{{ route('adminmaster.order.status', $model) }}" class="btn btn-sm btn-block btn-primary disabled">Paid</a>
@endif