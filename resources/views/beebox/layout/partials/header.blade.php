{{-- <header class="cd-auto-hide-header"> --}}
<nav class="navbar bootsnav ">
    <div class="container">  

       <div class="attr-nav">
        <ul>
           @if(Auth::user('auth'))
           <li><a href="{{url('/user/dashboard')}}" class="sub subs">Dashboard</a></li>
           @else
           <li><a href="{{url('/register')}}" class="sub subs">subscribe</a></li>
           @endif
            {{-- <li><a href="#" class="crt"><img src="{{url('assets/musicbeebox/images/cart.png')}}"><div class="crt-cut">01</div></a></li> --}}
        </ul>
    </div>     

    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('assets/musicbeebox/images/logo.png')}}" class="logo" alt=""></a>
    </div>

    <div class="collapse navbar-collapse main-nav" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{url('/about-us')}}">About us</a></li>
            <li><a href="{{url('/contact-us')}}">Contact</a></li>

            @if(Auth::guest())
                <li><a href="{{url('/login')}}"  class="cd-signin">login</a></li>
            @else
            <li>
                <a href="{{ url('/logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="cd-signin">Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @endif

            </ul>
        </div>
    </div>   
</nav>

{{-- </header>  --}}