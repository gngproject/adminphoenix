<label class="badge {{ ($model->status_kirim == 3) ? 'badge-success' : 'badge-primary' }}">
    {{ ($model->status_kirim == 3 ) ? 'Shipping' : 'New' }}
</label>