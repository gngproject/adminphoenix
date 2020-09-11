<label class="badge {{ ($model->status == 1) ? 'badge-success' : 'badge-warning' }}">
    {{ ($model->status == 1) ? 'Done' : 'New Entered' }}</label>