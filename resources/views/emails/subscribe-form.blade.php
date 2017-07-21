
<!DOCTYPE html>
<html>

<body style='background: white; color: #222'>

	<table width='600px' border='0' style="background:#583b78;text-align:center;">

		<thead>
			<tr><th colspan='2' style='background:#ffc900;color:#583b78;border:2px solid #583b78;'><img style='height:50px;' src="{{url(config('whyte.project.logo'))}}"><h4>Subscription Form</h4></th></tr>
		</thead>
		<tbody style="color:#ffc900">
			

			<tr><td>Dear Customer , You have been subscribed the videos and informations from Music Bee Box . Please click the link below for a confirmation  </td>
			</tr>
			<tr><td><a style="color: white;text-align:center;" href="{{url('/confirm-subscription/'.$user->subscribe_token)}}">CONFIRM SUBSCRIPTION</a></td></tr>

		</tbody>
	</table>

{{-- 
<table width='600px' border='0' style="background:#583b78;text-align:center;padding-top:40px;">
<tbody style="color:#ffc900">
	<tr><td><a href="{{url('/unsubscribe/'.$user->subscribe_token)}}" style="color:white;font-size:12px;">Unsubscribe</a></td></tr>
</tbody>
</table> --}}

</body>
</html> 

