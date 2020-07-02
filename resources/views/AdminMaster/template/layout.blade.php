@extends('AdminMaster.template.default')

@section('title', 'Data Detail')

@section('content')
<div class="class row">
    <div class="class col-lg-12">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID Product</th>
                    <td>{{ $detail->productID_view }}</td>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection