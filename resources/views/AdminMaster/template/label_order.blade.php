@if ($model->payment_status == 'pending')
<label class="badge badge-warning">
    pending
</label>

@else
<label class="badge badge-danger">
    Paid
</label>
@endif