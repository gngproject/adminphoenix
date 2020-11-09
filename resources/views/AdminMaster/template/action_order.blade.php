
@if($model->payment_status == 'pending')
    <a href="{{ route('adminmaster.order.status', $model->code) }}" class="btn btn-sm btn-block btn-danger">Unpaid</a>
@else
    <a href="{{ route('adminmaster.order.status', $model->code) }}" class="btn btn-sm btn-block btn-primary disabled">Paid</a>
@endif