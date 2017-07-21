@extends('beebox.layout.musicmaster')
@section('title','Music Bee Box')
@section('content')
<body>

  {{-- partials : header part here --}}
  <header class="cd-auto-hide-header">
    @include('beebox.layout.partials.header')
  </header> 
  {{--  Partials : header part here --}}



  <div class="slider">
    <div class="tp-banner-container">
      <div class="tp-banner" >
       <ul>	<!-- SLIDE  -->
        <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
         <!-- MAIN IMAGE -->
         <img src="{{url('assets/musicbeebox/images/slider/slidebg1.jpg')}}"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

         <!-- LAYER NR. 1 -->
         <div class="tp-caption customin customout"
         data-x="right" data-hoffset="100"
         data-y="bottom" data-voffset="-40"
         data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
         data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
         data-speed="800"
         data-start="700"
         data-easing="Power4.easeOut"
         data-endspeed="500"
         data-endeasing="Power4.easeIn"
         style="z-index: 3"><img src="{{url('assets/musicbeebox/images/slider/baby.jpg')}}" alt="">
       </div>

       <!-- LAYER NR. 2 -->
       <div class="tp-caption skewfromleft customout finewide_large_white"
       data-x="left" data-hoffset="0"
       data-y="center" data-voffset="-100"
       data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
       data-speed="500"
       data-start="1000"
       data-easing="Back.easeOut"
       data-endspeed="500"
       data-endeasing="Power4.easeIn"
       data-captionhidden="on"
       style="z-index: 14">NURSERY RHYMES <br> ACTIVITIES
     </div>

     <!-- LAYER NR. 3 -->
     <div class="tp-caption skewfromleft customout finewide_medium_white"
     data-x="left" data-hoffset="0"
     data-y="center" data-voffset="-10"
     data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
     data-speed="500"
     data-start="1300"
     data-easing="Back.easeOut"
     data-endspeed="500"
     data-endeasing="Power4.easeIn"
     data-captionhidden="on"
     style="z-index: 21">IN A BOX delivered to your door <br> for children aged 6 months to 3 years old
   </div>

   <!-- LAYER NR. 4 -->
   {{-- <div class="tp-caption skewfromleft customout finewide_medium_white1"
   data-x="left" data-hoffset="0"
   data-y="center" data-voffset="100"
   data-customin="x:0;y:100;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:1;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:0% 0%;"
   data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
   data-speed="500"
   data-start="1600"
   data-easing="Power4.easeOut"
   data-endspeed="500"
   data-endeasing="Power4.easeIn"
   data-captionhidden="on"
   style="z-index: 8">Order before New Year <br> to receive your JANUARY Box
 </div>
--}}


</li>
<!-- SLIDE  -->

</ul>
<div class="tp-bannertimer"></div>
</div>
</div>
</div>

<div class="ems">
 <div class="container">
  <div class="col-md-12 no-padding">
   <div class="row">
    <div class="col-md-6">
     <div class="col-md-6"><img src="{{url('assets/musicbeebox/images/slider/ems-box.png')}}" class="img-responsive"></div>
     <div class="col-md-6"><img src="{{url('assets/musicbeebox/images/music-child.png')}}" class="img-responsive music-child"></div>
     <div class="col-md-12"><h2>Brought to you by Music Bees Box, UK and Musical Child, Australia</h2></div>
   </div>

   <div class="col-md-6 aos-item" data-aos="fade-up" data-aos-duration="500">
     <h2>Each monthly subscription <br> <span>MUSIC BEES</span> BOX contains:</h2>
     <div class="col-md-12 no-padding">
      <div class="col-md-6 no-padding">
        <ul>
         <li>New nursery rhymes</li>
         <li>Music instruments</li>
         <li>Action accessory</li>
         <li>Puppet Glove</li>
       </ul>
     </div>

     <div class="col-md-6 no-padding">
      <ul>
       <li>Art Supplies</li>
       <li>Reward stickers</li>
       <li>Music Activity Plans</li>
     </ul>
   </div>
 </div>

 <p>Music time with your baby boosts their emotional and intellectual development, improves social skills and bonding between you, as well as affects their imagination and mood in a positive way. It can also develop a real passion for music which can become a great hobby or more in the future.</p>
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
         <h4> Monthly box<br/> <span> Available for </span></h4>
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
        <h4> <span> Subscribe for </span> <br> 3 Months</h4>
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
      <h4> <span> Subscribe for </span> <br> 6 Months</h4>
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


<div class="hw">
 <div class="container">
  <div class="col-md-12 no-padding">
   <div class="col-md-6 no-padding aos-item" data-aos="fade-up" data-aos-duration="500">
     <h2>HOW IT WORKS</h2>
     <ul>
      <li>Select your Monthly box for <strong>£20</strong>.</li>

      {{--  <li>Select your subscription option Monthly box for <strong>£23.95</strong>, 3 months - <strong> £21.95 </strong> Per month, 6 months - <strong>£19.95</strong> Per month </li> --}}
      <li>Receive your box and enjoy! </li>
    </ul>
  </div>
  <div class="col-md-6 no-padding aos-item" data-aos="fade-down" data-aos-duration="500"><img src="{{url('assets/musicbeebox/images/slider/hw.png')}}"></div>
</div>
</div>

</div>


<div class="sym" id="sub1">
  <div class="container">
   <div style="" class="col-md-12 no-padding">
   
   <div class="col-md-8 text-center sym-cen no-padding aos-item" data-aos="zoom-in" data-aos-duration="500">
     <h2>Shipping your <span> Music BEEs Box </span> </h2>
     <p>Shipping to the UK only. P & P is £3.95. As soon as we dispatch your box you will receive a tracking number (by Royal mail 1st class signed for). Please contact us in case you have not recieved it or if you have any other problems with the box. For International shipping rates contact us</p>
   </div>
   <div class="col-md-6 no-padding aos-item" data-aos="zoom-in" data-aos-duration="500">
    {{-- subscribe --}}
    {{-- <form method="POST" id="subscription"   action="{{url('/register')}}">

      {{csrf_field()}}

      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      @if(Session::has('msg'))
      <h4 style="color:red;">{{Session::get('msg')}}</h4>
      @elseif(Session::has('success'))
      <h4 style="color:green;">{{Session::get('success')}}</h4>
      @endif

      <h4 id="heading4" style="color: #ffc900"></h4>
      <div class="form-group">
        <div class="col-md-12 margin-bottom-30 clearfix">
          <select class="wide" name="length" id="length" required >
           <option value="">Subscription Length</option>
           <option value="3">3 Month</option>
           <option value="6">6 Month</option>
           <option value="12">12 Month</option>
         </select>
       </div>
     </div>

     <div class="form-group">
      <div class="col-md-6 margin-bottom-30">
        <input type="text" placeholder="Name" required class="form-control" id="names" name="names"  >

      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6 margin-bottom-30">
        <input type="email" required placeholder="E - mail" id="email" class="form-control" name="email" >
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6 margin-bottom-30">
        <input type="text" required placeholder="House No:" class="form-control" id="houseno" name="house_no" >
      </div>
      <div class="col-md-6 margin-bottom-30">
        <input type="text" required placeholder="Street" class="form-control"  id="street" name="street" >
        
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12 margin-bottom-30">
        <textarea class="form-control" rows="3" required placeholder="Address" id="address" name="address" ></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6 margin-bottom-30 clearfix">
        <select class="form-control ignore" style="background:#533672;color:#FFF" required name="city" id="city" >
         <option value="">City</option>
         @include('beebox.layout.partials.city')
       </select>
     </div>
     <div class="col-md-6 margin-bottom-30">
      <input type="number" placeholder="Postcode" required id="postcode" class="form-control" name="postcode" >
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-12 margin-bottom-30">
      <button class="sub-btn" type="submit" id="SendBtn" name="subscribe">subscribe </button>
    </div>
  </div>
  
</form> --}}

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

@endsection

@section('scripts')
@parent
<script type="text/javascript">
  var revapi;
  jQuery(document).ready(function() {
   revapi = jQuery('.tp-banner').revolution(
   {
    delay:9000,
    startwidth:1170,
    startheight:640,
    hideThumbs:10,
    fullWidth:"on",
    forceFullWidth:"on"
  });
 }); 
</script>

<script>
  AOS.init({
    easing: 'ease-out-back'
  });
</script>

@endsection
