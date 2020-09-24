@extends('AdminMaster.template.default')

@section('title','Pengiriman')

@section('content')
<div class="content mt-2">
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-default">
                @foreach ($model as $item)
				<div class="card-header card-header-border-bottom">
					<h2>Detail Shipment <u>#{{ $item->shipmentcode }}</u></h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-6 col-lg-6">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
							<address>
								<br>{{ $item->nama }}
								<br>{{ $item->alamat }}
								<br> Email: {{ $item->email }}
								<br> Phone: {{ $item->phone }}
							</address>
						</div>
						<div class="col-xl-6 col-lg-6">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								ID: <span class="text-dark"><b>#{{ $item->shipmentcode }}</b></span>
								<br>{{ $item->created_at }}
								<br> Status: {{ $item->status_kirim }}
								<br> Payment Status: {{ $item->status }}
								<br> Shipped by:
							</address>
						</div>
					</div>
					<table class="table mt-3 table-striped" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Item</th>
								<th>Qty</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $item->productID_view }}</td>
								<td>{{ $item->Product_Name }}</td>
								<td>{{ $item->quantity }}</td>
								<td>@currency($item->amount)</td>
							</tr>
						</tbody>
					</table>
					<div class="row justify-content-end">
						<div class="col-md-3">
							<ul class="list-unstyled mt-4">
								<li class="mid pb-3 text-dark">Subtotal
									<span class="d-inline-block float-right text-default">@currency($item->amount)</span>
								</li>
								<li class="mid pb-3 text-dark">Tax(10%)
									<span class="d-inline-block float-right text-default"></span>
								</li>
								<li class="mid pb-3 text-dark">Shipping Cost
									<span class="d-inline-block float-right text-default">Rp.0</span>
								</li>
								<li class="pb-3 text-dark">Total
									<span class="d-inline-block float-right">@currency($item->amount)</span>
								</li>
							</ul>
						</div>
                    </div>
                    <div class="form-footer pt-5 border-top">
						<a href="{{ route("adminmaster.pengiriman.show") }}" class="btn btn-secondary btn-default">Back</a>
					</div>
                </div>
                @endforeach
			</div>
		</div>
	</div>
</div>
@endsection