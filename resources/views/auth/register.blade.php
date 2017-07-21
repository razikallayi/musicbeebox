@extends('beebox.layout.musicmaster')
@section('title','Music Bee Box')

@section('styles')
@parent
<style>
.amount-label{
    color: #ffd500;
    font-size: 20px;
    padding: 15px 0;
    text-align: center;
  }


  .form-control[type=checkbox] {
    height:20px;
  }

  .form-control[type=checkbox]:focus {
    border-color: #000;
    outline: 0;
    -webkit-box-shadow: 0;
    box-shadow: 0 0 0 0;
    border: #000 0px solid !important;
  }
  .monthbox{
    text-align: center;
    color: #e2e2e2;
    font-size: 18px;
  }

  .the-legend {
    border-style: none;
    border-width: 0;
    font-size: 18px;
    color: #e2e2e2;
  }
  .the-fieldset {
    height:100%;
  }
</style>
@endsection

@section('content')
<body>

  {{-- partials : header part here --}}
  <header class="cd-auto-hide-header">
    @include('beebox.layout.partials.header')
  </header> 
  {{--  Partials : header part here --}}


<div class="sym" id="sub1">
  <div style="padding: 150px 0 200px;" class="container">
   <div class="col-md-12 no-padding">
    <div class="col-md-6 no-padding aos-item" data-aos="zoom-in" data-aos-duration="500">
     <h2>Shipping your <span> Music BEEs Box </span> </h2>
     <p>Shipping to the UK only. P & P is £3.95. As soon as we dispatch your box you will receive a tracking number (by Royal mail 1st class signed for). Please contact us in case you have not recieved it or if you have any other problems with the box.</p>
     <img src="{{url('assets/musicbeebox/images/slider/sym-box.png')}}" class="img-responsive">
   </div>
   <div class="col-md-6 no-padding aos-item" data-aos="zoom-in" data-aos-duration="500">
    {{-- subscribe --}}
    <form method="POST" id="subscription"   action="{{ url('/register')}}">

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


     <div class="form-group">
      <div class="col-md-12 margin-bottom-30">
        <input type="text" placeholder="Name" required class="form-control" id="name" name="name" value="{{old('name')}}" >
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12 margin-bottom-30">
        <input type="email" required placeholder="E - mail" id="email" class="form-control" name="email" value="{{old('email')}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12 margin-bottom-30">
        <input type="text" placeholder="Username" required class="form-control" id="username" name="username" value="{{old('username')}}" >
      </div>
    </div>

     <div class="form-group">
      <div class="col-md-6 margin-bottom-30">
        <input type="password" placeholder="Password" required class="form-control" id="password" name="password" value="{{old('password')}}" >
      </div>
    </div>
     <div class="form-group">
      <div class="col-md-6 margin-bottom-30">
        <input type="password" placeholder="Confirm Password" required class="form-control" id="password_confirmation" name="password_confirmation"  >
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6 margin-bottom-30">
        <input type="text" required placeholder="House No:" class="form-control" id="houseno" name="house_no" value="{{old('house_no')}}">
      </div>
      <div class="col-md-6 margin-bottom-30">
        <input type="text" required placeholder="Street" class="form-control"  id="street" name="street" value="{{old('street')}}">
        
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12 margin-bottom-30">
        <textarea class="form-control" rows="4" required placeholder="Address" id="address" name="address" >{{old('address')}}</textarea>
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
      <input type="number" placeholder="Postcode" required id="postcode" class="form-control" name="postcode" value="{{old('postcode')}}" >
    </div>
  </div>

  {{-- <div class="form-group monthbox row">
    <div class="col-xs-12">
      <p style="padding:0px;">Choose Subscriptions:</p>
    </div>
    <div class="row">
    @if(null != old('months'))
      @foreach(old('months') as $month)
        @php
        switch($month){
          case 3: 
            $three_months="checked";
            break;
          case 6 :
            $six_months="checked";
            break;
          case 12 :
            $twelve_months="checked";
            break;
          }
        @endphp
      @endforeach
      @endif
      <div class="col-xs-4">
        <label><input type="checkbox"  name="months[]" value="3" class="subscription_checkbox form-control" {{$three_months or ""}}> 3 Months</label>
      </div>
      <div class="col-xs-4">
        <label><input type="checkbox"  name="months[]" value="6" class="subscription_checkbox form-control" {{$six_months or ""}}> 6 Months</label>
      </div>
      <div class="col-xs-4">
        <label><input type="checkbox" name="months[]"  value="12" class="subscription_checkbox form-control" {{$twelve_months or ""}}> 12 Months</label>
      </div>
    </div>
</div> --}}

  {{-- <div class="form-group">
        <div class="col-md-9 margin-bottom-30">
          <select class="wide" name="subscription_length" id="length" required >
           <option value="">Subscription Length</option>
           <option value="3">3 Month</option>
           <option value="6">6 Month</option>
           <option value="12">12 Month</option>
         </select>
       </div>

       <div class="col-md-3 margin-bottom-30">
        <label for="price" class="amount-label">Amount</label>
      </div>
     </div> --}}

 {{--      <div class="col-md-12">
       <div class="pull-right"><label style="color:#ffd500">Total Amount:</label> <label for="price" class="amount-label"> £0</label></div>
      </div>
 --}}
  <div class="form-group">
    <div class="col-md-12 margin-bottom-30">
    <p class="help-block">*All fields are mandatory</p>
      {{-- onclick="subscribeForm()"  --}}
      <button class="sub-btn" type="submit" id="SendBtn" name="subscribe">Register </button>
    </div>
  </div>
  



</form>












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

<script>
  $(document).ready(function() {
    @if(auth()->guest())
     $('.sub.subs').hide();
    @endif
    // $('select:not(.ignore)').niceSelect();      
  });
</script>

<script>
  AOS.init({
    easing: 'ease-out-back'
  });
</script>

<script>
  {{--Make the option selected when showing server side validation error--}}
  @if(old('city'))
  var city = "{{old('city')}}";
  $(function(){
    $.each($('#city option'),function(index,option){
      if(option.innerHTML == city){
        $(option).prop('selected','selected');
      }
    })
  });
  @endif
</script>


{{-- form submit using javascript --}}
<script type="text/javascript">
  function loginSubmit() {
   document.getElementById("loginform").submit();

 }    
</script>

{{-- validation testing  --}}

<script type="text/javascript">

 function subscribeForm() 
 {

   var length = document.getElementById('length').value;
   var names = document.getElementById('names').value;
   var email = document.getElementById('email').value;
   var houseno = document.getElementById('houseno').value;
   var street = document.getElementById('street').value;
   var address = document.getElementById('address').value;
   var city = document.getElementById('city').value;
   var postcode = document.getElementById('postcode').value;
   if(length == "" || names== "" || email=="" || houseno == "" || street=="" || address=="" || city =="" || postcode=="")
   {
    var filter  = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

    if(!filter.test(email) )
    {
     document.getElementById('subscription').disabled = 'disabled';
     document.getElementById('heading4').innerHTML=" Please fill all the fields !!!" ;

   }

 }
 else
 {
    //document.getElementById('subscription').disabled = false;
    document.getElementById("subscription").submit();
  }
  
}  

</script>
{{-- sign up form submit ends here --}}

<script type="text/javascript">
  $(function(){
    // $('#subscription').submit(function(event) {
    //   event.preventDefault();
      
    //   $('#SendBtn').text('Sending...');
    //   $('#SendBtn').prop('disabled', true);
    //   var formData = {
    //     'length'       : $('input[name=length]').val(),
    //     'email'      : $('input[name=email]').val(),
    //     'house_no'      : $('input[name=house_no]').val(),
    //     'street'    : $('textarea[name=street]').val(),
    //     'address'    : $('textarea[name=address]').val(),
    //     'city'    : $('textarea[name=city]').val(),
    //     'post_code'    : $('textarea[name=postcode]').val()
    //   };
    //   var message;
    //   $.ajax({
    //     type        : 'POST',
    //     url         : '{{url('subscribe')}}',
    //     data        : formData, // our data object
    //     dataType    : 'json', // what type of data do we expect back from the server
    //     encode          : true,
    //     success: function(data){
    //       if(data.status=="success"){
    //         message= "Thank you for Subscription !!";
    //       }
    //       else{
    //         message= "Sorry! Couldnot send mail.";
    //       }
    //     },
    //     error: function(){
    //       message = "Failed! Couldnot send mail.";
    //     },
    //     complete: function(){
    //      // popup(message);
    //      $('#SendBtn').prop('disabled', false);
    //      $('#SendBtn').text('SEND');
    //      document.getElementById("subscription").reset();
    //    }
    //  })
    // });
    // 
     
    // popup = function(message(){
    //  alert(message); 
    // })
  });
</script>
<script type="text/javascript">

//Used for all Ajax posts
// CSRF protection
$.ajaxSetup({
  headers: {
    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>
@endsection
