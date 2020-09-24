@if($model->status_kirim == 3)
    <label class="badge badge-success">
        Shipping
    </label>
@else
    <label class="badge badge-success">
        Procced to Shipment
    </label>
@endif