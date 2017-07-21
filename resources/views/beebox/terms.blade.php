@extends('beebox.layout.musicmaster')
@section('title','Music Bee Box')
@section('content')
<body class="aos-all">
    {{-- partials : header part here --}}
    <header class="cd-auto-hide-header auto-in">
        @include('beebox.layout.partials.header')
    </header>
    {{--  Partials : header part here --}}
    <style>
        .abt h3{
			font-size: 20px;
			text-transform: uppercase;
		}
    </style>
    <div class="abt">
        <div class="container" style="margin-bottom:150px;">
            <div class="col-md-12 no-padding">
                <div class="row">
                    <h2>
                        Terms and Conditions
                    </h2>
                    <div class="col-md-12 aos-item" data-aos="fade-up" data-aos-duration="500">
                        <h3>
                            Introduction
                        </h3>
                        <p>
                            These terms regulate between you and Music Bees Box Ltd in regards to your use of our website  www.musicbeesbox.co.uk. Our website  is operated by Music Bees Box Ltd, a company registered in the UK (registered number  10352151 ) with the registered office address at 71-75 Shelton Street, Covent Garden, London, United Kingdom, WC2H 9JQ.  Please contact us at
                            <a href="mailto:info@musicbeesbox.co.uk">
                                info@musicbeesbox.co.uk
                            </a>
                        </p>
                        <h3>
                            Site content
                        </h3>
                        <p>
                        	We are the owners or licensee of Intellectual property rights on our website and printed materials in the box protected by copyright law and all such rights are reserved. You must not resell, republish, post,  copy, modify or upload any of our materials anywhere else for personal or commercial purposes.
                        </p>
                        <h3>
                        	Privacy policy
                        </h3>
                        Confidentiality of your personal information is important to us. Music Bees Box uses this information to process and ship your orders and will never disclose any of your personal information to a third party. We store all the information securely. We process your payments with a third party PayPal.
                        <h3>
                        	Delivery policy
                        </h3>
                        <p>
                        	We do everything to ship your box as soon as we receive the order and we will send a tracking number for the 1st class signed for Royal mail postage. We do not specify delivery date however depending on availibility we reserve the right to send the parcel within 30 days from the order date.
                        </p>
                        <h3>
                        	Cancellation policy
                        </h3>
                        <p>
                        	You can cancel your monthly subscription at any time. You are not eligible for cancellations on a 3 and 6 month subscription.
                        </p>
                    </div>
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
</body>
@endsection
	@section('scripts')
	@parent
<script src="{{url('assets/musicbeebox/js/bootsnav.js')}}">
</script>
<script src="{{url('assets/musicbeebox/js/jquery.nice-select.min.js')}}">
</script>
<script>
    $(document).ready(function() {
			$('select:not(.ignore)').niceSelect();
		});
</script>
<script src="{{url('assets/musicbeebox/js/aos.js')}}">
</script>
<script>
    AOS.init({
			easing: 'ease-in-out-sine'
		});
</script>
<script src="{{url('assets/musicbeebox/js/main.js')}}">
</script>
<script src="{{url('assets/musicbeebox/js/model.js')}}">
</script>
@endsection
