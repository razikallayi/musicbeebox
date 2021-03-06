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
body{
  color: white;
}

.user-name{
    color:white;
  }
.user-name label{
  color: #ffd500;
}

.terms{
  color:white;
  font-weight: 400;
}

.terms a{
  color:#ffd500;
}

.sub-btn:disabled{
  background: #777777;
  color:#aaaaaa;
}

.form-group a:hover{
    text-decoration: underline;
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

@php
$user = auth()->user();
@endphp

<div class="sym" id="sub1">
  <div style="padding: 150px 0 200px;" class="container">
   <div class="col-md-12 no-padding">
   <form method="POST" id="subscription"   action="{{ url('/subscribe')}}">

      {{csrf_field()}}
    <div class="col-md-6 no-padding aos-item" data-aos="zoom-in" data-aos-duration="500">
     <h3 class="user-name">Hello <label>{{$user->name}}</label>,</h3>
     
     <div class="address">
       <label>Billing Address</label>
       <p>{{$user->getPrimaryAddress()->house_no}}, {{$user->getBillingAddress()->street}}</p>
       <p>{{$user->getBillingAddress()->address}}</p>
       <p>{{$user->getBillingAddress()->city}}</p>
       <p>{{$user->getBillingAddress()->postcode}}</p>
     </div>

     <div class="old_shipping_address">
       <label>Shipping Address</label>
       <p>{{$user->getPrimaryAddress()->house_no}}, {{$user->getBillingAddress()->street}}</p>
       <p>{{$user->getBillingAddress()->address}}</p>
       <p>{{$user->getBillingAddress()->city}}</p>
       <p>{{$user->getBillingAddress()->postcode}}</p>
     </div>
     <div class="">
      <label class="form-inline form-group">
      @if(old('new_shipping_address'))
      <input id="new_shipping_address_checkbox" checked type="checkbox" class="form-control" name="new_shipping_address">
      @else
      <input id="new_shipping_address_checkbox"  type="checkbox" class="form-control" name="new_shipping_address">
      @endif
       New shipping address
       </label>
    </div>
   </div>
   <div class="col-md-6 no-padding aos-item" data-aos="zoom-in" data-aos-duration="500">
    {{-- subscribe --}}

      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

@if(null == old('new_shipping_address'))
<div class="row new_shipping_address" style="display:none">
@else
<div class="row new_shipping_address">
@endif
 <div class="col-md-12  margin-bottom-30">
<label>Shipping Address</label>
</div>
    <div class="form-group">
      <div class="col-md-6 margin-bottom-30">
        <input type="text" placeholder="House No:" class="form-control" id="houseno" name="house_no" value="{{old('house_no')}}">
      </div>
      <div class="col-md-6 margin-bottom-30">
        <input type="text" placeholder="Street" class="form-control"  id="street" name="street" value="{{old('street')}}">
        
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-12 margin-bottom-30">
        <textarea class="form-control" rows="4" placeholder="Address" id="address" name="address" >{{old('address')}}</textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-6 margin-bottom-30 clearfix">
        <select class="form-control ignore" style="background:#533672;color:#FFF" name="city" id="city" >
         <option value="">City</option>
         @include('beebox.layout.partials.city')
       </select>
     </div>
     <div class="col-md-6 margin-bottom-30">
      <input type="number" placeholder="Postcode" id="postcode" class="form-control" name="postcode" value="{{old('postcode')}}" >
    </div>
  </div>
  </div>

  <div class="form-group monthbox row">
    <div class="col-xs-12">
      <p style="padding:0px;">Choose Subscriptions:</p>
    </div>
    <div class="row">
      @inject('plans','App\Models\Plan')
      @foreach($plans::all() as $plan)
      <div class="col-xs-6">
          <label><input type="checkbox"  name="months[]" value="{{$plan->length}}" class="subscription_checkbox form-control"> {{$plan->name}}</label>
      </div>
      @endforeach
    </div>
</div>

      <div class="col-md-12">
       <div class="pull-right"><label style="color:#ffd500">Total Amount:</label> <label for="price" class="amount-label"> £0</label></div>
      </div>

  <div class="form-group">

    <div class="col-md-12 margin-bottom-30">
    <label class="form-inline form-group terms"><input type="checkbox" required form-control" name="terms"> I accept all <a target="_blank" href="{{url('terms')}}"> terms and conditions</a>.</label>
      <button class="sub-btn" type="submit" id="SubmitButton" name="subscribe">Subscribe using <img height="30px" style="margin-top:10px" src="{{url('assets/musicbeebox/images/paypal.png')}}"></button>
    </div>
  </div>
  

</div>

</form>


<script src="https://www.paypalobjects.com/api/button.js?"
     data-merchant="braintree"
     data-id="paypal-button"
     data-button="checkout"
     data-color="gold"
     data-size="medium"
     data-shape="pill"
     data-button_type="submit"
     data-button_disabled="false"
 ></script>
<!-- Configuration options:
  data-color: "blue", "gold", "silver"
  data-size: "tiny", "small", "medium"
  data-shape: "pill", "rect"
  data-button_disabled: "false", "true"
  data-button_type: "submit", "button"
-->

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


<script src="https://js.braintreegateway.com/web/3.6.2/js/client.min.js"></script>
<script src="https://js.braintreegateway.com/web/3.6.2/js/paypal.min.js"></script>

<script>
  console.log(braintree);

  // Fetch the button you are using to initiate the PayPal flow
var paypalButton = document.getElementById('paypal-button');

// Create a Client component
braintree.client.create({
  authorization: 'TOKEN'
}, function (clientErr, clientInstance) {
  // Create PayPal component
  braintree.paypal.create({
    client: clientInstance
  }, function (err, paypalInstance) {
    paypalButton.addEventListener('click', function () {
      // Tokenize here!
      paypalInstance.tokenize({
        flow: 'checkout', // Required
        amount: 10.00, // Required
        currency: 'USD', // Required
        locale: 'en_US',
        enableShippingAddress: true,
        shippingAddressEditable: false,
        shippingAddressOverride: {
          recipientName: 'Scruff McGruff',
          line1: '1234 Main St.',
          line2: 'Unit 1',
          city: 'Chicago',
          countryCode: 'US',
          postalCode: '60652',
          state: 'IL',
          phone: '123.456.7890'
        }
      }, function (err, tokenizationPayload) {
        // Tokenization complete
        // Send tokenizationPayload.nonce to server
      });
    });
  });
});
</script>

<script>
  $(document).ready(function() {
    $('.sub.subs').hide();
    // $('select:not(.ignore)').niceSelect();      
  });
</script>

<script>
  $(document).ready(function() {
    $('#new_shipping_address_checkbox').change(function(){
      console.log($(this).prop("checked"));
        if ($(this).prop("checked")) {
               $('.new_shipping_address').slideDown();
               $('.old_shipping_address').slideUp();
        }else{
               $('.new_shipping_address').slideUp();
               $('.old_shipping_address').slideDown();
        }
    });
  });
</script>

<script>
  AOS.init({
    easing: 'ease-out-back'
  });
</script>


<script>
beebox ={};
 $('.subscription_checkbox').change(function(){
  var totalAmount=0;
  $.each($('.subscription_checkbox'), function(){
      if ($(this).prop("checked")) {
        totalAmount +=  beebox.getPackageAmount($(this).val());
      }
  })
    totalAmount = parseFloat(totalAmount.toFixed(2));
    $('.amount-label').text(" £"+totalAmount);
 })

 beebox.getPackageAmount = function(length){
   var length = parseInt(length);
   var amount=0;
   switch(length){
    @foreach($plans::all() as $plan)
    case {{$plan->length}}:
    amount = {{$plan->price}};
    break;
    @endforeach
    default:
    amount = 0;
  }
  var total = (length*amount).toFixed(2);
  return parseFloat(total);
 }
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

  @if(null != old('months'))
    $.each($('.subscription_checkbox'), function(){
      @foreach(old('months') as $length)
        if ($(this).val() == {{$length}}) {
          $(this).prop("checked",'checked')
        }
      @endforeach
  })
  $(function(){
    $('.subscription_checkbox').change();
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
    $("#subscription").submit(function(){
      $('#SubmitButton').prop('disabled','disabled');
    });
 // function subscribeForm() 
//  {

//    var length = document.getElementById('length').value;
//    var names = document.getElementById('names').value;
//    var email = document.getElementById('email').value;
//    var houseno = document.getElementById('houseno').value;
//    var street = document.getElementById('street').value;
//    var address = document.getElementById('address').value;
//    var city = document.getElementById('city').value;
//    var postcode = document.getElementById('postcode').value;
//    if(length == "" || names== "" || email=="" || houseno == "" || street=="" || address=="" || city =="" || postcode=="")
//    {
//     var filter  = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

//     if(!filter.test(email) )
//     {
//      document.getElementById('subscription').disabled = 'disabled';
//      document.getElementById('heading4').innerHTML=" Please fill all the fields !!!" ;

//    }

//  }
//  else
//  {
//     //document.getElementById('subscription').disabled = false;
//     document.getElementById("subscription").submit();
//   }
  
// }  

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
