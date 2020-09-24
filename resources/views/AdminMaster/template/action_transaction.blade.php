@if($model->status == 'success')
<a href="{{ route('adminmaster.pengirim.resi', $model->TransactionID) }}" class="btn btn-sm btn-block btn-primary disabled">Shipping</a>
@else
<a href="{{ route('adminmaster.pengirim.resi', $model->TransactionID) }}" class="btn btn-sm btn-block btn-success">Procced to Shipment</a>


@endif