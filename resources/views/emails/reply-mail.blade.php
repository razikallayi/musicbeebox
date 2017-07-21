
<!DOCTYPE html>
<html>
<!-- <head>Music Bee Box</head> -->
<body style='background: white; color: #222'>

	<table width='600px' border='0' style="background:#583b78;text-align:center;">

		<thead>
			<tr><th colspan='2' style='background:#ffc900;color:#583b78;border:2px solid #583b78;'><img style='height:50px;' src="{{url(config('whyte.project.logo'))}}"><h4>Subscription Form</h4></th></tr>
		</thead>
		<tbody style="color:#ffc900">
			<tr><td>Dear Customer , You have been subscribed the videos and informations from Music Bee Box . Inorder to login our site , 
				Please use the informations below.</td>
			</tr>
		</tbody>
	</table>

	<table style="text-align:center;background:#583b78; color:#ffc900;" width='600px' border='0'>

	<th>To create your login credentials , please click the links below</th>

	<tr><td><a style="color:white;" href="{{url('/create-credentials/'.$user->subscribe_token)}}">Click here to Create your login credentials  </a></td></tr>


		{{-- <tr><td>Email : </td><td>{{$user->email}}</td></tr> --}}

		{{-- <tr><td><a href="{{url('/create-username/'.$user->subscribe_token)}}">Click here to Create Username  </a></td></tr> --}}
		{{-- <tr><td> </td><td>{{$user->username}}</td></tr> --}}
		
		{{-- <tr><td><a href="{{url('/create-password/'.$user->subscribe_token)}}">Click here to create your Password  </a></td></tr> --}}

	</table>

	
	
	{{-- <table width='600px' border='0' style="background:#583b78;text-align:center;padding-top:40px;">
	<tbody style="color:#ffc900">
		<tr><td><a href="{{url('/unsubscribe/'.$user->subscribe_token)}}" style="color:white;font-size:12px;">Unsubscribe</a></td></tr>
	</tbody>
</table> --}}


</body>
</html> 

