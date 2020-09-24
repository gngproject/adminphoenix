@if ($model->status == 'pending')
<label class="badge badge-warning">
    pending
</label>
@elseif($model->status == 'shipping')
<label class="badge badge-success">
   shipping
</label>
@else
<label class="badge badge-danger">
    Paid
</label>
@endif