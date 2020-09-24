@extends('AdminPengirim.template.default')

@section('title','Shipment Detail')

@section('content')
<div class="content mt-2">
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-default">
                
				<div class="card-header card-header-border-bottom">
					<h2>Detail Shipment <u>#{{ $result->shipmentcode }}</u></h2>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-xl-6 col-lg-6">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
							<address>
								<br>{{ $result->nama }}
								<br>{{ $result->alamat }}
								<br> Email: {{ $result->email }}
								<br> Phone: {{ $result->phone }}
							</address>
						</div>
						<div class="col-xl-6 col-lg-6">
							<p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
							<address>
								ID: <span class="text-dark"><b>#{{ $result->shipmentcode }}</b></span>
								<br>{{ $result->created_at }}
								<br> Status: {{ $result->status_kirim }}
								<br> Payment Status: {{ $result->status }}
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
								<td>{{ $result->productID_view }}</td>
								<td>{{ $result->Product_Name }}</td>
								<td>{{ $result->quantity }}</td>
								<td>@currency($result->amount)</td>
							</tr>
						</tbody>
					</table>
					<div class="row justify-content-end">
						<div class="col-md-3">
							<ul class="list-unstyled mt-4">
								<li class="mid pb-3 text-dark">Subtotal
									<span class="d-inline-block float-right text-default">@currency($result->amount)</span>
								</li>
								<li class="mid pb-3 text-dark">Tax(10%)
									<span class="d-inline-block float-right text-default"></span>
								</li>
								<li class="mid pb-3 text-dark">Shipping Cost
									<span class="d-inline-block float-right text-default">Rp.0</span>
								</li>
								<li class="pb-3 text-dark">Total
									<span class="d-inline-block float-right">@currency($result->amount)</span>
								</li>
							</ul>
						</div>
                    </div>
                    
                    <div class="form-footer pt-5 border-top">
						<a href="{{ route("adminpengirim.pengiriman.home") }}" class="btn btn-secondary btn-default">Back</a>
					</div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection