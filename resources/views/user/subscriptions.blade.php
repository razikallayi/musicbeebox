@extends('user.layout.master')

@section('title', 'Subscriptions')

@section('content')
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="body table-wrapper">
			<table class="table table-bordered table-responsive table-striped table-hover  dataTable">
				<thead>
					<tr>
						<th>Transaction ID</th>
						<th>Items</th>
						<th>Shipping Address</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
{{-- 
@php
$user = auth()->user();
$subscriptions = $user->subscriptions()->where('is_success',true)->all();
@endphp

				@foreach($subscriptions as $subscription)
					<tr>
						<td>{{$subscription->payment_id}}</td>
						<td>
								<strong>{{$subscription->plan->name}}</strong> ({{$subscription->plan->price}} {{"GBP"}})<br/>
						</td>
						<td>
							{{$subscription->address->name}}<br/>
							{{$subscription->address->house_no}}<br/>
							{{$subscription->address->street}}<br/>
							{{$subscription->address->address}}<br/>
							{{$subscription->address->city}}<br/>
							{{$subscription->address->postcode}},{{$subscription->address->country}}<br/>
							<br/>
						</td>
						<td>{{$subscription->plan->price}} {{"GBP"}}</td>
					</tr>
					@endforeach --}}
					
					 
{{-- 					<tr>
						<td>{{$id}}</td>
						<td>
							@foreach($itemlist as $items)
								<strong>{{$items->name}}</strong> ({{$items->price}} {{$items->currency}})<br/>
							@endforeach
						</td>
						<td>
							{{auth()->user()->name}}<br/>
							{{$address->house_no}}<br/>
							{{$address->street}}<br/>
							{{$address->address}}<br/>
							{{$address->city}}<br/>
							{{$address->postcode}},{{$address->country}}<br/>
							<br/>
						</td>
						<td>{{$amount->total}} {{$amount->currency}}</td>
					</tr> --}}


@foreach($subscriptions as $subscription)
					<tr>
						<td>{{$subscription['payment']->id}}</td>
						<td>
							@foreach($subscription['payment']->transactions[0]->item_list->items as $items)
								<strong>{{$items->name}}</strong> ({{$items->price}} {{$items->currency}})<br/>
							@endforeach
						</td>
						<td>
							{{$subscription['address']->name}}<br/>
							{{$subscription['address']->house_no}}<br/>
							{{$subscription['address']->street}}<br/>
							{{$subscription['address']->address}}<br/>
							{{$subscription['address']->city}}<br/>
							{{$subscription['address']->postcode}},{{$subscription['address']->country}}<br/>
							<br/>
						</td>
						<td>{{$subscription['payment']->transactions[0]->amount->total}} {{$subscription['payment']->transactions[0]->amount->currency}}</td>
					</tr>

					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>

 </div>
@endsection

@section('scripts')
@parent

<script type="text/javascript">
	$(document).ready(function() {
		$('.table').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				'csv', 'excel', 'pdf', 
				{
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .prepend(
                            '<img src="{{url(config('whyte.project.logo'))}}"/>'
                        );
                }
            }
			]
		} );
	});
</script>


<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-subscriptions").addClass('active').find('a').click();
});
</script>

@endsection