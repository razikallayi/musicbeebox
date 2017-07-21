<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#462e61">
<link rel="icon" sizes="192x192" href="{{url('assets/admin/favicon.png')}}">

<title>@yield('title')</title>


@section('styles')
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{url('assets/musicbeebox/css/bootstrap.min.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('assets/musicbeebox/css/bootstrap-theme.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('assets/musicbeebox/css/font-awesome.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('assets/musicbeebox/css/stylesheet.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('assets/musicbeebox/css/bootsnav.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{url('assets/musicbeebox/css/settings.css')}}" media="screen" />
<link rel="stylesheet" type="text/css" href="{{url('assets/musicbeebox/css/aos.css')}}" media="all" />

@show

</head>

{{-- Content section here  --}}

@yield('content')

{{-- Content section ends here --}}

@section('scripts')
<script src="{{url('assets/musicbeebox/js/jquery-2.1.0.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/musicbeebox/js/bootsnav.js')}}"></script> 
<script type="text/javascript" src="{{url('assets/musicbeebox/js/jquery.themepunch.tools.min.js')}}"></script>

{{-- 
<script src="{{url('assets/musicbeebox/js/jquery.nice-select.min.js')}}"></script>
 --}}
<script src="{{url('assets/musicbeebox/js/aos.js')}}"></script>

<script src="{{url('assets/musicbeebox/js/main.js')}}"></script> 
<script src="{{url('assets/musicbeebox/js/model.js')}}"></script> 

<script src="{{url('assets/musicbeebox/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('assets/musicbeebox/js/modernizr.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('assets/musicbeebox/js/jquery.themepunch.revolution.min.js')}}"></script>

@show


</body>
</html>
