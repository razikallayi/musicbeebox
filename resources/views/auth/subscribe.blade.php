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
  label{
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
     <div class="col-md-12 no-padding row">
       <form method="POST" id="subscription"   action="{{ url('/subscribe')}}">

        {{csrf_field()}}
        <div class="col-md-6 no-padding aos-item" data-aos="zoom-in" data-aos-duration="500">

         <div class="old_shipping_address">
           <dl class="responsive-tabs clearfix">
                    <dt>Shipping Address</dt>
                        <dd >
                        <div class="col-md-12 no-padding animated fadeIn">
                          <h4>Hello <span>{{$user->name}}, </span></h4>
                            <table class="table table-bordered table-striped">
                               <tbody>
                                  <tr>
                                     <td width="40%">Address</td>
                                     <td width="60%">{{$user->getShippingAddress()->address}}</td>
                                  </tr>
                                  <tr>
                                     <td width="40%">City</td>
                                     <td width="60%">{{$user->getShippingAddress()->city}}</td>
                                  </tr>
                                  <tr>
                                     <td width="40%">House No.</td>
                                     <td width="60%">{{$user->getShippingAddress()->house_no}}</td>
                                  </tr>
                                  <tr>
                                     <td width="40%">Street</td>
                                     <td width="60%">{{$user->getShippingAddress()->street}}</td>
                                  </tr>
                                  <tr>
                                     <td width="40%">Postcode</td>
                                     <td width="60%">{{$user->getShippingAddress()->postcode}}</td>
                                  </tr>
                               </tbody>
                            </table>
                        </div>
                        </dd>

                        </dl>


          {{--  <p>{{$user->getShippingAddress()->house_no}}, {{$user->getShippingAddress()->street}}</p>
           <p>{{$user->getShippingAddress()->address}}</p>
           <p>{{$user->getShippingAddress()->city}}</p>
           <p>{{$user->getShippingAddress()->postcode}}</p> --}}
         </div>
         <div class="col-sm-12">
          <label class="form-inline form-group">
            @if(old('new_shipping_address'))
            <input id="new_shipping_address_checkbox" checked type="checkbox" class="form-control" name="new_shipping_address">
            @else
            <input id="new_shipping_address_checkbox"  type="checkbox" class="form-control" name="new_shipping_address">
            @endif
            New Shipping Address
          </label>
        </div>
      </div>

      <div class="col-md-6 su-pd">

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
          <label class="lead">New Shipping Address</label>
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
            {{-- <p style="padding:0px;">Choose Subscriptions:</p> --}}
            <label  class="lead">Choose Your Subscribtion</label>
          </div>
          <div class="row">
            @inject('plans','App\Models\Plan')
            @foreach($plans::all() as $plan)
            <div class="col-xs-12">
              <label><input type="checkbox"  name="months[]" value="{{$plan->length}}" class="subscription_checkbox form-control"> {{$plan->name}}</label>
            </div>
            @endforeach
          </div>
        </div>

        <div class="col-md-12">
         <div class="pull-right"><label class="lead" style="color:#ffd500">Total Amount:</label> <label for="price" class="amount-label"> £0</label></div>
       </div>

       <div class="form-group">

        <div class="col-md-12 margin-bottom-30">
             <div class="tc">
                    <input id='one' type='checkbox' required name="terms" />
                    <label for='one'><span></span>
                    I accept all &nbsp; <a target="_blank" href="{{url('terms')}}"> terms and conditions</a>
                    </label>
                  </div>
          <button class="sub-btn" type="submit" id="SubmitButton" name="subscribe">Subscribe using <img height="30px" style="margin-top:10px" src="{{url('assets/musicbeebox/images/paypal.png')}}"></button>
        </div>
      </div>


    </div>

  </form>
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
<script src="{{url('assets/musicbeebox/js/bootsnav.js')}}"></script> 
<script src="{{url('assets/musicbeebox/js/main.js')}}"></script> 
<script>
  $.fn.responsiveTabs = function () {
    return this.each(function () {
      var el = $(this), tabs = el.find('dt'), content = el.find('dd'), placeholder = $('<div class="responsive-tabs-placeholder"></div>').insertAfter(el);
      tabs.on('click', function () {
        var tab = $(this);
        tabs.not(tab).removeClass('active');
        tab.addClass('active');
        placeholder.html(tab.next().html());
      });
      tabs.filter(':first').trigger('click');
    });
  };
  $('.responsive-tabs').responsiveTabs();

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
