@extends('user.layout.master')

@section('title', 'Videos')

@section('content')
<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>EXAMPLE</h2>
				</div>
				<div class="body">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<iframe width="460" height="260" src="https://www.youtube.com/embed/0Hdijl61V7k" frameborder="0" allowfullscreen></iframe>
						</div>

					</div>
				</div>
			</div>
		</div>


		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			
			<div class="card">
				<div class="header">
					<h2>EXAMPLE</h2>
				</div>
				<div class="body">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<iframe width="460" height="260" src="https://www.youtube.com/embed/Qd0Rkm9Hzz0" frameborder="0" allowfullscreen></iframe>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			
			<div class="card">
				<div class="header">
					<h2>EXAMPLE</h2>
				</div>
				<div class="body">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<iframe width="460" height="260" src="https://www.youtube.com/embed/tY3fW-_e1eA" frameborder="0" allowfullscreen></iframe>
						</div>

					</div>
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
   $("#mnu-videos").addClass('active').find('a').click();
});
</script>

@endsection