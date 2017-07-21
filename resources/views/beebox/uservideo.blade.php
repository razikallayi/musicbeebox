@extends('beebox.layout.musicmaster')
@section('title','Music Bee Box')
@section('content')
<body class="aos-all">
	<body class="aos-all">
		<header class="cd-auto-hide-header auto-in">
			@include('beebox.layout.partials.header')
		</header>

		<div class="abt conta">
			<div class="container">
				<div class="col-md-12 no-padding margin-top-40">
				
				
				
					@if(Auth::user())

					@foreach($videos as $video)
					@if((Auth::user()->length) == ($video->subscription_month )) 
					
					<div class="col-md-4 menu-in">
						<video width="320" height="240" controls>
							<source src="{{url('uploads/video/'.$video->video)}}" type="video/mp4">
							</video>
							<h4 ><a href="" style="color: black;">{{$video->title}}</a></h4>
							<p ><a href="" style="color: black;">{{$video->description}}</a></p>
						</div>

						

						@endif
						@endforeach	


						@else
						<h4>Oops... Data is not available !!!</h4>
						@endif
						
					
					
					
						
					</div>
				</div>
			</div>
			{{-- {{url('uploads/video/'.$video->video)}} --}}
			{{-- Partials : Footer section here --}}

			@include('beebox.layout.partials.footer')

			{{-- Partials : footer section here --}}

			{{-- Footer bottom : section --}}

			@include('beebox.layout.partials.footer-bottom')

			{{-- Footer section here --}}


			{{-- ############### popup box #################--}}

			@include('beebox.layout.partials.popup')

			{{--################### popup box #################### --}}

		</body>
		@endsection

		@section('scripts')
		@parent
		<script src="{{url('assets/musicbeebox/js/bootsnav.js')}}"></script> 
		<script src="{{url('assets/musicbeebox/js/jquery.nice-select.min.js')}}"></script>
		<script>
			$(document).ready(function() {
				$('select:not(.ignore)').niceSelect();      
			});    
		</script>
		<script src="{{url('assets/musicbeebox/js/aos.js')}}"></script>
		<script>
			AOS.init({
				easing: 'ease-in-out-sine'
			});
		</script>
		<script src="{{url('assets/musicbeebox/js/main.js')}}"></script> 
		<script src="{{url('assets/musicbeebox/js/model.js')}}"></script>

		<script type="text/javascript">
			function myform() {
				document.getElementById("form1").submit();

			}    
		</script>

		@endsection