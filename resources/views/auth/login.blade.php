@extends('beebox.layout.musicmaster')
@section('title','Music Bee Box')

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
   <div class="col-md-6 col-md-offset-3 no-padding aos-item" data-aos="zoom-in" data-aos-duration="500">

  <div class="aos-item" data-aos="zoom-in" data-aos-duration="500">
  <div class="logo text-center">

        <a href="{{ url(config('whyte.project.link')) }}"><img src="{{ url(config('whyte.project.logo')) }}"></a>
        <small>{{ config('whyte.project.subname') }}</small>
    </div>
   </div>

    {{-- subscribe --}}
    <form method="POST" id="subscription"   action="{{ url('/login')}}">

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
        <input type="text" placeholder="Username" required class="form-control" id="username" name="username" value="{{old('username')}}" >
      </div>
    </div>

     <div class="form-group">
      <div class="col-md-12 margin-bottom-30">
        <input type="password" placeholder="Password" required class="form-control" id="password" name="password" value="{{old('password')}}" >
      </div>
    </div>

  <div class="form-group">
    <div class="col-md-12 margin-bottom-30">
      {{-- onclick="subscribeForm()"  --}}
      <button class="sub-btn" type="submit" id="SendBtn" name="subscribe">Login </button>
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
    $('.cd-signin').hide();
    // $('select:not(.ignore)').niceSelect();      
  });
</script>

<script>
  AOS.init({
    easing: 'ease-out-back'
  });
</script>
@endsection
