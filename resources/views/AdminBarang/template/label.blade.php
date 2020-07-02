<label class="badge {{ ($model->status == 1) ? 'badge-success' : 'badge-danger' }}">
    {{ ($model->status == 1) ? 'Active' : 'Not Active' }}</label>