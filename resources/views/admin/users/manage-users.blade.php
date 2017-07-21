@extends('admin.layout.master')
@section('title','Manage Users')
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
						<th>Name</th>
						<th>Email</th>
						<th>Subscription [in months] </th>
						<th>Address</th>
						
						<th>Subscribe</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>

					@foreach($users as $user)
					
					<tr>
						<td  width="10px">{{$loop->iteration}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->length}}</td>
						<td>{{$user->address}}</td>
						<td><a href="{{url('/admin/send-newsletter/'.$user->subscribe_token)}}">Send Newsletter</a></td>

							<td width="10px"><a href="{{url('admin/edit-user/'.$user->id)}}"><i class="material-icons">edit</i></a></td>
							<td width="10px"><a href="{{url('admin/delete-user/'.$user->id)}}" onclick="event.preventDefault();
								document.getElementById('delete-form-{{$user->id}}').submit();">
								<form id="delete-form-{{$user->id}}" action="{{ url('admin/delete-user/'. $user->id) }}" method="post" style="display: none;">
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
	$("#mnu-user").addClass('active').find('a').click();
});
</script>
@endsection