@extends('beebox.layout.musicmaster')
@section('title','Music Bee Box')
@section('content')
<body class="aos-all">
	{{-- partials : header part here --}}
	<header class="cd-auto-hide-header auto-in">
		@include('beebox.layout.partials.header')
	</header>
	{{--  Partials : header part here --}}

	<div class="abt">
		<div class="container">
			<div class="col-md-12 no-padding">
				<div class="row">
					<h2>About Us</h2>
					<div class="col-md-6 aos-item" data-aos="fade-up" data-aos-duration="500">

						<p>Music Bees Box was created by a qualified vocalist who was teaching music for babies and was often asked by parents after classes about how to practice it with their little ones at home. During the music lessons, there were lots of instruments and accessories available for babies to explore, but at home, even though there was no problem finding their favourite tunes online, parents had no idea what to do and no tools. Also the cost, and work commitments together with travelling, made it sometimes impossible for some to attend weekly classes. Also, those parents who bought expensive extensive sets of instruments for home, often found that once children saw everything without instructions and routine that lessons give, they were quickly losing interest and there was no surprise element and gradual involvement unlike with music classes where a new theme was introduced each time.</p> 
					</div>
					<div class="col-md-6 aos-item" data-aos="fade-up" data-aos-duration="500">
						<p>          	
							We teamed up with MUSICAL CHILD, Australia and that's how the idea of Music Bees Box came up. Each box has everything for doing music activities together with your child, including traditional nursery rhymes' lyrics with a recorded voice and without which you can access online with a code on www.musicalchild.com.au on Music bees box page . Also this box is ideal for moms to invite a few friends over with babies to do nursery rhymes activities together following a simple guide in the comfort of their own home in a small group and maybe even share the cost and the box. Or maybe the older children would like to entertain their younger siblings.</p>


						</div>
						
						</div>
					</div>
				</div>
			</div>


			<div class="sm">
				<div class="container">
					<div class="col-md-12 no-padding">
						<div class="row">

						<div class="col-md-4 col-md-offset-4 aos-item" data-aos="fade-up" data-aos-duration="500">
							<div class="three-month tr">
								@if(Auth::user('auth'))
								<li><a href="{{url('/user/dashboard')}}" class="sub subs">Dashboard</a></li>
								@else
								<a href="{{url('/register')}}">Buy</a>
								@endif
								<h4>  Monthly box  <br/><span> available for </span></h4>
								<div class="3box">
									<img src="{{url('assets/musicbeebox/images/slider/3box.png')}}">
									<div class="price-3box">£ 20</div>
								</div>
							</div>
						</div>


							{{-- <div class="col-md-4 aos-item" data-aos="fade-up" data-aos-duration="500">
								<div class="three-month tr">
									<h4> <span> Subscribe for </span> <br> Monthly box</h4>
									@if(Auth::user('auth'))
									<li><a href="{{url('/user/dashboard')}}" class="sub subs">Dashboard</a></li>
									@else
									<a href="{{url('/register')}}">Subscribe</a>
									@endif
									<div class="3box">
										<img src="{{url('assets/musicbeebox/images/slider/3box.png')}}">
										<div class="price-3box">£ 23.95</div>
									</div>
								</div>
							</div>

							<div class="col-md-4 aos-item" data-aos="fade-up" data-aos-duration="500">
								<div class="three-month sx">
									<h4> <span> Subscribe for </span> <br> 3 months</h4>
									@if(Auth::user('auth'))
									<li><a href="{{url('/user/dashboard')}}" class="sub subs">Dashboard</a></li>
									@else
									<a href="{{url('/register')}}">Subscribe</a>
									@endif
									<div class="3box">
										<img src="{{url('assets/musicbeebox/images/slider/3box.png')}}">
										<div class="price-3box">£ 21.95</div>
									</div>
								</div>
							</div>

							<div class="col-md-4 aos-item" data-aos="fade-down" data-aos-duration="500">
								<div class="three-month tw">
									<h4> <span> Subscribe for </span> <br> 6 months</h4>
									@if(Auth::user('auth'))
									<li><a href="{{url('/user/dashboard')}}" class="sub subs">Dashboard</a></li>
									@else
									<a href="{{url('/register')}}">Subscribe</a>
									@endif
									<div class="3box">
										<img src="{{url('assets/musicbeebox/images/slider/3box.png')}}">
										<div class="price-3box">£ 19.95</div>
									</div>
								</div>
							</div>
 --}}
							

						</div>
					</div>
				</div>
			</div>


			{{-- Footer section here --}}

			@include('beebox.layout.partials.footer')

			{{-- footer section ends here --}}

			{{-- footer bottom section --}}

			@include('beebox.layout.partials.footer-bottom')

			{{-- footer bottom ends --}}


			{{-- ############### popup box #################--}}

			@include('beebox.layout.partials.popup')

			{{--################### popup box #################### --}}


			{{-- <footer class="ftr">
				<div class="container">
					<div class="col-md-12 no-padding">
						<div class="col-md-4 no-padding aos-item" data-aos="fade-up" data-aos-duration="500">
							<div class="ftr-sec1">
								<img src="images/ftr-logo.png" class="img-responsive">
								<div class="ftr-con">
									<ul>
										<li> <i><img src="images/map-ftr.png"></i> Dummy Street,  Floor XI001 <br> Country - Place</li>
										<li><a href="#">  <i><img src="images/mail-ftr.png"></i> info@musicbees.co.uk</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-4 no-padding text-center aos-item" data-aos="fade-down" data-aos-duration="500">
							<div class="ftr-sec1 bor">
								<img src="images/email-ftr.png">
								<h4><a href="#">info@musicbeesbox.co.uk</a></h4>
							</div>
						</div>

						<div class="col-md-4 no-padding text-right aos-item" data-aos="fade-up" data-aos-duration="500">
							<div class="ftr-sec1">
								<h3>Follow us On</h3>

								<div class="fw clearfix">
									<ul>
										<li><a href="#"><img src="images/fb.png"></a></li>
										<li><a href="#"><img src="images/ins.png"></a></li>
									</ul>
								</div>

								<p>MUSIC BEES BOX is a new subscription service in the UK and we can't wait for you to share your reviews with us. Please follow us on FB and instagram</p>
							</div>
						</div>

					</div>
				</div>
			</footer> --}}


			{{-- <div class="ftr-btm">
				<div class="container">
					<div class="col-md-12 no-padding">
						<div class="row">
							<div class="cpy">© 2016 Music Bees Box. All Rights Reserved.</div>
							<div class="pwb">Powerd by <a href="http://www.whytecreations.com/" target="_blank" rel="dofollow"><img src="images/whyte.png"> Whyte Company </a></div>

						</div>
					</div>
				</div>

			</div> --}}


{{-- 

			<div class="cd-user-modal"> 
				<div class="cd-user-modal-container">
					<ul class="cd-switcher">
						<li><a href="#0">Login</a></li>
						<li><a href="#0">New Registration</a></li>
					</ul>

					<div id="cd-login">
						<form class="cd-form">
							<p class="fieldset">
								<label class="image-replace cd-email" for="signin-email">E-mail</label>
								<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="signin-password">Password</label>
								<input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
								<a href="#0" class="hide-password">Hide</a>
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<input type="checkbox" id="remember-me" checked>
								<label for="remember-me">Remember me</label>
							</p>

							<p class="fieldset">
								<input class="full-width" type="submit" value="Login">
							</p>
						</form>

						<p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
					</div> 

					<div id="cd-signup"> 
						<form class="cd-form">
							<p class="fieldset">
								<label class="image-replace cd-username" for="signup-username">Username</label>
								<input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-email" for="signup-email">E-mail</label>
								<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<label class="image-replace cd-password" for="signup-password">Password</label>
								<input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
								<a href="#0" class="hide-password">Hide</a>
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<input type="checkbox" id="accept-terms">
								<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
							</p>

							<p class="fieldset">
								<input class="full-width has-padding" type="submit" value="Create account">
							</p>
						</form>

					</div> 

					<div id="cd-reset-password"> 
						<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

						<form class="cd-form">
							<p class="fieldset">
								<label class="image-replace cd-email" for="reset-email">E-mail</label>
								<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
								<span class="cd-error-message">Error message here!</span>
							</p>

							<p class="fieldset">
								<input class="full-width has-padding" type="submit" value="Reset password">
							</p>
						</form>

						<p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
					</div> 
					<a href="#0" class="cd-close-form">Close</a>
				</div> 
			</div> --}}
			
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
		@endsection
