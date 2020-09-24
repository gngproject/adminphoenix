

@if($model->status == 'shipping')
     <a href="{{ route('adminmaster.pengirim.resi', $model->TransactionID) }}" class="btn btn-sm btn-block btn-success">Procced to Shipment</a>
@elseif($model->status == 'pending')
    <a href="{{ route('adminmaster.order.status', $model->TransactionID) }}" class="btn btn-sm btn-block btn-primary" d>Payment Pending</a>
@else
    <a href="{{ route('adminmaster.order.status', $model->TransactionID) }}" class="btn btn-sm btn-block btn-primary" disabled>Transaction Success</a>
@endif