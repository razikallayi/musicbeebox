@extends('user.layout.master')

@section('title', 'Dashboard')

@section('content')
<div class="row">

@php 
$user = auth()->user();
@endphp

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-brown">
					<h2>My Details</h2>
				</div>
				<div class="body">
					<div class="list-group">
						<label>Name:</label><a class="list-group-item">{{$user->name}}</a>
						<br/>
						<label>Email:</label><a class="list-group-item">{{$user->email}}</a><br/>
						<label>Address:</label><a class="list-group-item">{{$user->getBillingAddress()->address}}</a><br/>
						<label>House No:</label><a class="list-group-item">{{$user->getBillingAddress()->house_no}}</a><br/>
						<label>Street:</label><a class="list-group-item">{{$user->getBillingAddress()->street}}</a><br/>
						<label>City:</label><a class="list-group-item">{{$user->getBillingAddress()->city}}</a><br/>
						<label>Post Code:</label><a class="list-group-item">{{$user->getBillingAddress()->postcode}}</a><br/>
					</div>
				</div>
			</div>
		</div>




@if($user->isUpgradable())
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="header bg-brown">
					<h2>Upgrade Subscription</h2>
				</div>
				<div class="body">
					<div class="list-group">
					@if(!$user->three_months)
						<a href="{{url('user/upgrade/3')}}" class="list-group-item">3 Months</a>
					@endif
					@if(!$user->six_months)
						<a href="{{url('user/upgrade/12')}}" class="list-group-item">6 Months</a>
					@endif
					@if(!$user->twelve_months)
						<a href="{{url('user/upgrade/12')}}" class="list-group-item">12 Months</a>
					@endif
					</div>
				</div>
			</div>
		</div>
@endif

 </div>
@endsection

@section('scripts')
@parent

<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-dashboard").addClass('active').find('a').click();
});
</script>

@endsection