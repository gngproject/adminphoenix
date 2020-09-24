@if ($model->status == 'pending')
<label class="badge badge-warning">
    Unpaid
</label>
@elseif($model->status == 'success')
<label class="badge badge-success">
   Paid
</label>
@else
<label class="badge badge-danger">
    Cancel
</label>
@endif