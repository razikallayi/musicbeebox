@extends('beebox.layout.musicmaster')
@section('title','Music Bee Box')
@section('content')

<body class="aos-all">
	<header class="cd-auto-hide-header auto-in">
		@include('beebox.layout.partials.header')
	</header>

	<div class="abt conta">
		<div class="container">
			<div class="col-md-12 no-padding">
				<div class="row">
					<h2>Contact Us</h2>
					<div class="col-md-7 aos-item no-padding" data-aos="fade-up" data-aos-duration="500">
						<form method="post" action="">
							
							
							<div class="form-group">
								<div class="col-md-12 margin-bottom-30">
									<input type="text" placeholder="Name" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 margin-bottom-30">
									<input type="email" placeholder="E - mail" class="form-control">
								</div>
								<div class="col-md-6 margin-bottom-30">
									<input type="text" placeholder="Phone Number" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 margin-bottom-30">
									<textarea class="form-control" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12 margin-bottom-30">
									<button class="sub-btn">Submit </button>
								</div>
							</div>
							
						</form>
						
					</div>
					<div class="col-md-5 aos-item" data-aos="fade-up" data-aos-duration="500">
						
						<div class="cont">
							<img src="{{url('assets/musicbeebox/images/ftr-logo.png')}}">
							<div class="con-ad">
								<ul>
									
									<li><a href="mailto:info@musicbeesbox.co.uk"><i><img src="{{url('assets/musicbeebox/images/mail-ftr.png')}}"></i> info@musicbeesbox.co.uk</a></li>
								</ul>
							</div>
							
							<div class="con-so">
								<ul>
									<li><a href="https://www.facebook.com/Music-Bees-Box-1541816962500325/" target="_blank"><i class="fa fa-facebook"></i></a></li>
								</ul>
							</div>
							
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		
		
	</div>

	{{-- Partials : Footer section here --}}

	@include('beebox.layout.partials.footer')

	{{-- Partials : footer section here --}}

	{{-- Footer bottom : section --}}

	@include('beebox.layout.partials.footer-bottom')

	{{-- Footer section here --}}


	{{-- ############### popup box #################--}}

	@include('beebox.layout.partials.popup')

	{{--################### popup box #################### --}}



{{-- 
<footer class="ftr">
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


<script type="text/javascript">
  function loginSubmit() {
     document.getElementById("loginform").submit();
    
  }    
</script>

@endsection