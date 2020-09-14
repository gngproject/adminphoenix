@extends('AdminMaster.template.default')

@section('title','Pengiriman')

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Orders</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Daftar Pesanan
                            </h4>
                        </div>
                        <div class="card-body">
                            <table id="dataTables" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                    <th>ID Payment</th>
                                    <th>Pelanggan</th>
                                    <th>Telp</th>
                                    <th>Alamat</th>
                                    <th>Subtotal</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>
                                <div class="panel-body">
                                    <label for="filter-status"> Filter Berdasarkan Status Pengiriman :</label>
                                    <select data-column="1" class="form-control col-sm-4 filter-status" placeholder="Filter Berdasarkan Status Pengiriman :">
                                        <option value=""> --Pilih Status-- </option>
                                        <option value="1"> New </option>
                                        <option value="3"> Shipping </option>
                                        <option value="4"> Done </option>
                                    </select>
                                    <br>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
                @push('scriptspengirim')
                <script type="text/javascript">
                    $(function() {
                    $('#dataTables').DataTable({
                        processing: true,
                        serverSide: true,
                        dom: '<"html5buttons">Blfrtip',
                        language: {
                                buttons: {
                                    colvis : 'show / hide', // label button show/hide
                                    colvisRestore: "Reset Kolom" //label untuk reset kolom ke default
                                }
                        },
                        buttons : [
                                    {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                                    {extend: 'excel', title: 'Pengiriman Datatables'},
                                    {extend: 'print', title: 'Pengiriman Datatables'},
                        ],
                        ajax: '{{ route('adminmaster.pengiriman.data') }}',
                        columns: [
                            { data:'TransactionID' },
                            { data:'nama' },
                            { data:'phone' },
                            { data:'alamat' },
                            { data:'amount' },
                            { data:'created_at' },
                            { data:'status' },
                            { data:'action' },
                        ],
                    });
                        //filter Berdasarkan status kirim
                        $('.filter-status').change(function () {
                            table.column( $(this).data('column'))
                            .search( $(this).val() )
                            .draw();
                        });
                    });
                </script>
                @endpush
                @include('sweetalert::alert')
            </div>
        </div>
    </div>
</main>
@endsection