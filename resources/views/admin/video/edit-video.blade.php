@extends('admin.layout.master')

@section('title','Edit Video')

@section('styles')
@parent
<link href="{{url('assets/admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

@endsection

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<div class="card">
		<div class="body">
			
			
			<form id="form_validation" method="POST" action="{{url('/admin/update-video/'.$results->id)}}" enctype="multipart/form-data">
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

				<h2 class="card-inside-title">Title</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="text" name="title" value="{{$results->title}}" maxlength="50" class="form-control" required>
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Description</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<textarea name="description"  class="form-control" required>{{$results->description}}</textarea>
							</div>
						</div>
					</div>
				</div>
				
				<h2 class="card-inside-title">Upload Video</h2>

				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<video width="320" height="240" controls>
								<source src="{{url('uploads/video/'.$results->video)}}" type="video/mp4">
							</video>
							</div>
						</div>
					</div>
				</div>

				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<input type="file" name="videos" accept="video/*" class="form-control" >
							</div>
						</div>
					</div>
				</div>

				<h2 class="card-inside-title">Subscribe For :</h2>
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group ">
							<div class="form-line">
								<select name="subcribe_month" class="form-control show-tick" required>
									<option value="">-- Choose a subscription month --</option>
									<option value="3">3 Months</option>
									<option value="6">6 Months</option>
									<option value="12">12 Months</option>
								</select>
								
							</div>
						</div>
					</div>
				</div>
				
				
				<div class="row clearfix">
					<div class="col-sm-12">
						<div class="form-group">
							<div class="">
								<input type="submit" name="save"  value="Upload Video" class="btn btn-success waves-effect" >
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