@extends('admin.layout.master')

@section('title', 'Subscriptions')

@section('content')
<div class="row">
@if(null != $payments)
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="body table-wrapper">
				<table class="table table-bordered table-responsive table-striped table-hover  dataTable">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Transaction Id</th>
							<th>Created Date</th>
							<th>Payer Name</th>
							<th>Billing Address</th>
							<th>Shipping Address</th>
							<th>Items</th>
						</tr>
					</thead>
					<tbody>
						@foreach($payments as $payment)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$payment->id}}</td>
								<td>{{$payment->create_time}}</td>
								<td>{{$payment->payer->payer_info->first_name}}</td>
								<td>{{$payment->payer->payer_info->shipping_address->line1}}{{$payment->payer->payer_info->shipping_address->city}}</td>
								<td>
								@if(isset($payment->address))
									{{$payment->address->house_no}}, {{$payment->address->street }}<br/>
									{{$payment->address->address}}<br/>
									{{$payment->address->city}}<br/>
									{{$payment->address->country}}<br/>
									{{$payment->address->postcode}}
								@endif
								</td>
								<td>
							@if(array_has($payment->transactions[0],'item_list'))
								@foreach($payment->transactions[0]->item_list->items as $items)
								<strong>{{$items->name}}</strong> ({{$items->price}} {{$items->currency}})<br/>
								@endforeach
							@endif
								</td>

							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@else
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
	<div class="body">
			<h1>No Subscriptions</h1>
		</div>
	</div>
</div>
@endif

		{{-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-brown">
					<h2>Upload Video </h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/upload-video')}}" class="list-group-item">Upload</a>
						<a href="{{url('admin/manage-video')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>   --}}
{{-- 
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-brown">
					<h2>Category</h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/add-category')}}" class="list-group-item">Add</a>
						<a href="{{url('admin/manage-category')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>  


		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-brown">
					<h2>Subcategory</h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/add-subcategory')}}" class="list-group-item">Add</a>
						<a href="{{url('admin/manage-subcategory')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>  


		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-brown">
					<h2>Audio</h2>
				</div>
				<div class="body">
					<div class="list-group">
						<a href="{{url('admin/add-audio')}}" class="list-group-item">Add</a>
						<a href="{{url('admin/manage-audio')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>  

		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-brown">
					<h2>Comments</h2>
				</div>
				<div class="body">
					<div class="list-group">
						
						<a href="{{url('admin/manage-comments')}}" class="list-group-item">Manage</a>
					</div>
				</div>
			</div>
		</div>  


		--}}

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
	$("#mnu-dashboard").addClass('active').find('a').click();
});
</script>

@endsection