@extends('user.layout.master')

@section('title', 'Subscribe')

@section('content')
<div class="row">

@php 
$user = auth()->user();
@endphp

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="card">
		<div class="header bg-brown">
		<h2>New Subscription/Gift</h2>
		</div>
		<div class="body">
			

    <form method="POST" id="subscription" action="{{ url('subscribe')}}">
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


<div class="col-md-12 old_shipping_address">
<label>Shipping Address</label>
<table class="table table-bordered table-striped">
 <tbody>
  <tr>
   <td width="40%">Name</td>
   <td width="60%">{{$user->getShippingAddress()->name or $user->name}}</td>
 </tr>
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

  <div class="col-md-12">
    @if(old('new_shipping_address'))
    <input id="new_shipping_address_checkbox" checked type="checkbox" class="form-control chk-col-deep-purple" name="new_shipping_address">
    @else
    <input id="new_shipping_address_checkbox"  type="checkbox" class="form-control chk-col-deep-purple" name="new_shipping_address">
    @endif
    <label for="new_shipping_address_checkbox">Ship to new address
    </label>
  </div>
    @if(null == old('new_shipping_address'))
      <div class="col-md-12 new_shipping_address" style="display:none">
    @else
      <div class="col-md-12 new_shipping_address">
    @endif
    <label>New Shipping Address</label>
        <div class="col-sm-12">
        	<label>Name</label>
        	<div class="form-group ">
        		<div class="form-line">
        			<input type="text" value="{{old('name')}}" name="name" maxlength="255" class="form-control">
        		</div>
        	</div>
        </div>

        <div class="col-sm-6">
        <label>House No</label>
        	<div class="form-group ">
        		<div class="form-line">
        			<input type="text" placeholder="House No:" class="form-control" id="houseno" name="house_no" value="{{old('house_no')}}">
        		</div>
        	</div>
        </div>
        <div class="col-sm-6">
        <label>Street</label>
        	<div class="form-group">
        		<div class="form-line">
    			    <input type="text" placeholder="Street" class="form-control"  id="street" name="street" value="{{old('street')}}">
        		</div>
        	</div>
        </div>

        <div class="col-sm-12">
        <label>Address</label>
        	<div class="form-group">
        		<div class="form-line">
    			    <textarea class="form-control" rows="4" placeholder="Address" id="address" name="address" >{{old('address')}}</textarea>
        		</div>
        	</div>
        </div>

        <div class="col-sm-6">
        <label>City</label>
        	<div class="form-group1">
        		<div class="form-line">
        			<select class="form-control" name="city" id="city" >
        				<option value="">City</option>
        				@include('beebox.layout.partials.city')
        			</select>
        		</div>
        	</div>
        </div> 
        <div class="col-sm-6">
        <label>Post Code</label>
        	<div class="form-group">
        		<div class="form-line">
        			<input type="number" placeholder="Postcode" id="postcode" class="form-control" name="postcode" value="{{old('postcode')}}">
        		</div>
        	</div>
        </div>
      </div>


        <div class="col-md-12 text-center">
          <label class="lead">Choose Your Subscribtion</label>
          <div class="form-group">
            @inject('plans','App\Models\Plan')
            @foreach($plans::all() as $plan)
            <div class="col-xs-12">
             <input type="checkbox" id="months-{{$loop->iteration}}" name="months[]" value="{{$plan->length}}" class="subscription_checkbox form-control filled-in chk-col-deep-purple">
             <label for="months-{{$loop->iteration}}">{{$plan->name}}</label>
           </div>
           @endforeach
         </div>
       </div>

        <div class="row">
         <div class="col-xs-12">
         <span class="text-center">
         <label class="col-deep-purple">Total Amount:</label> <label for="price" class="col-deep-purple amount-label"> £0</label></span>
         </div>
       </div>

       <div class="row">
       		<div class="col-xs-12 form-group">
       			<div>
       				<input id='terms' type='checkbox' class="chk-col-deep-purple" name="terms" />
       				<label for='terms'>
       					I accept all <a target="_blank" href="{{url('terms')}}"> terms and conditions</a>
       				</label>
       			</div>
       			<button class="btn bg-amber waves-effect" type="submit" id="SubmitButton" name="subscribe">Subscribe using <img height="30px" style="margin-top:2px" src="{{url('assets/musicbeebox/images/paypal.png')}}"></button>
       		</div>
       </div>




			
		</div>
    </form>
	</div>
</div>


 </div>
@endsection

@section('scripts')
@parent

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


<script type="text/javascript">
//Activate current item in left side menu
$(document).ready(function() {
   $(".menu .list li").removeClass('active');
   $("#mnu-subscribe").addClass('active').find('a').click();
});
</script>

@endsection