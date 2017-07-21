@extends('admin.layout.master')
@section('title','Manage Video')
@section('styles')
@parent
<link href="{{url('assets/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card table-wrapper">

			<div class="body">
			{{-- @if (session()->has('status'))
			<div class="alert alert-danger">
				<ul>
					<li>{{ session()->get('status')}}</li>
				</ul>
			</div>
			@endif --}}

			<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
				<thead>
					<tr>
						<th>SL NO:</th>
						<th>Title</th>
						<th>Description</th>
						<th>Video</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>

					@foreach($videos as $video)
					
					<tr>
						<td  width="10px">{{$loop->iteration}}</td>
						<td>{{$video->title}}</td>
						<td>{{$video->description}}</td>
						<td>
							<video width="320" height="240" controls>
								<source src="{{url('uploads/video/'.$video->video)}}" type="video/mp4">
							</video>
						</td>
							<td width="10px"><a href="{{url('admin/edit-video/'.$video->id)}}"><i class="material-icons">edit</i></a></td>
							<td width="10px"><a href="{{url('admin/delete-video/'.$video->id)}}" onclick="event.preventDefault();
								document.getElementById('delete-form-{{$video->id}}').submit();">
								<form id="delete-form-{{$video->id}}" action="{{ url('admin/delete-video/'. $video->id) }}" method="post" style="display: none;">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
								</form><i class="material-icons">delete</i></a></td>

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
//Activate current item in left side menu
$(document).ready(function() {
	$(".menu .list li").removeClass('active');
	$("#mnu-video").addClass('active').find('a').click();
});
</script>
@endsection