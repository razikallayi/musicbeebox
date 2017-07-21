@extends('admin.layout.master')

@section('title','Edit User')

@section('styles')
@parent
<link href="{{url('assets/admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="card">
		<div class="body">
			
			<form id="form_validation" method="POST" action="{{url('/admin/update-user/'.$results->id)}}" enctype="multipart/form-data">
				{{csrf_field()}}

				{{ method_field('PUT') }}

				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				{{-- ################ session flash message here #################--}}	
				{{-- @if(Session::has('msg'))
				<h2 class="card-inside-title"><span style="color:green;font-size: 16px;">{!!Session::get('msg')!!}</span></h2>
				@endif
				@if(Session::has('error'))
				<h2 class="card-inside-title"><span style="color:red;font-size: 16px;">{!!Session::get('error')!!}</span></h2>
				@endif 
				@if(Session::has('upload_error'))
				<h2 class="card-inside-title"><span style="color:red;font-size: 16px;">{!!Session::get('upload_error')!!}</span></h2>
				@endif --}}
				{{-- ##################### session flash message ends here ##################--}}

				<input type="hidden" name="id" value="{{$results->id}}">

				

				{{-- <h2 class="card-inside-title">Username</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="username" value="{{$results->username}}"  class="form-control" required>
							</div>
						</div>
					</div>
				</div> --}}

				<h2 class="card-inside-title">Email</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="email"  class="form-control" value="{{$results->email}}" required>
							</div>
						</div>
					</div>
				</div>
				
				{{-- <h2 class="card-inside-title">Password</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="password"  class="form-control"  value="{{$results->password}}" required>
							</div>
						</div>
					</div>
				</div> --}}

				<h2 class="card-inside-title">Subscription Length</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<select name="length"  class="form-control" required>
									<option value="">--- Choose Subscription Length ---</option>
									<option value="3">3 Months</option>
									<option value="6">6 Months</option>
									<option value="12">12 Months</option>
								</select>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">House No:</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="house_no"  class="form-control"  value="{{$results->house_no}}" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Street</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="street"  class="form-control"  value="{{$results->street}}" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Address</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="address"  class="form-control"  value="{{$results->address}}" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">City</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="city"  class="form-control"  value="{{$results->city}}" required>
							</div>
						</div>
					</div>
				</div>
				

				<h2 class="card-inside-title">Post Code</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="postcode"  class="form-control"  value="{{$results->post_code}}" required>
							</div>
						</div>
					</div>
				</div>
				

				{{-- <h2 class="card-inside-title">Published</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
						@if($results->is_checked == "Y")
							<div class="demo-checkbox">
								<input type="checkbox" name="is_checked" id="md_checkbox_30"  class="filled-in chk-col-pink" value="Y" checked />
								<label for="md_checkbox_30">Publish</label>
							</div>
						@elseif($results->is_checked == "N")	
							<div class="demo-checkbox">
								<input type="checkbox" name="is_checked" id="md_checkbox_30"  class="filled-in chk-col-pink" value="Y"  />
								<label for="md_checkbox_30">Publish in Menu</label>
							</div>
						@endif

							
						</div>
					</div>
				</div> --}}
				
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="">
								<input type="submit" name="save"  value="Save Data" class="btn btn-success waves-effect" >
							</div>
						</div>
					</div>
				</div>

			</form>	

		</div>
	</div>

</div>

@endsection

@section('scripts')
@parent
<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
	$(".menu .list li").removeClass('active');
	$("#mnu-video").addClass('active').find('a').click();
});
</script>

@endsection


@section('scripts')
@parent
<script src="{{url('assets/admin/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
@endsection