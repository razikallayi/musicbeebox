<li class="header" id="mnu-dashboard">
    <a href="{{url('/user/dashboard')}}">
        <span>
            DASHBOARD
        </span>
    </a>
</li>
<!-- ################# video uploads ################## -->
{{-- <li id="mnu-videos">
    <a class="menu-toggle" href="javascript:void(0);">
        <span>
            Videos
        </span>
    </a>
    <ul class="ml-menu">
        @if(auth()->user()->three_months)
        <li class="three">
            <a class="" href="{{url('user/videos/3')}}">
                <span>
                    3 Month
                </span>
            </a>
        </li>
        @endif
    @if(auth()->user()->six_months)
        <li class="six">
            <a class="" href="{{url('user/videos/6')}}">
                <span>
                    6 Month
                </span>
            </a>
        </li>
        @endif
    @if(auth()->user()->twelve_months)
        <li class="twelve">
            <a class="" href="{{url('user/videos/12')}}">
                <span>
                    12 Month
                </span>
            </a>
        </li>
        @endif
    </ul>
</li> --}}

<li id="mnu-subscribe" >
  <a href="{{url('user/subscribe')}}">
    <span>Subscribe</span>
  </a>
</li>

<li id="mnu-subscriptions" >
    <a href="{{url('user/subscriptions')}}">
       <span>My Subscriptions</span>
   </a>
</li>

<!-- ################# Users ################## -->
{{--
<li id="mnu-category">
    <a class="menu-toggle" href="javascript:void(0);">
        <span>
            My Details
        </span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="" href="{{url('admin/manage-users')}}">
                <span>
                    Manage Users
                </span>
            </a>
        </li>
    </ul>
    --}}
</li>
<!-- ################# Sub Category ################## -->
{{--
<li id="mnu-subcat">
    <a class="menu-toggle" href="javascript:void(0);">
        <span>
            Subcategory
        </span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="" href="{{url('admin/add-subcategory')}}">
                <span>
                    Add SubCategory
                </span>
            </a>
        </li>
        <li>
            <a class="" href="{{url('admin/manage-subcategory')}}">
                <span>
                    Manage SubCategory
                </span>
            </a>
        </li>
    </ul>
</li>
--}}
<!-- ####################333#########  Page    #########################333333 -->
{{--
<li id="mnu-audio">
    <a class="menu-toggle" href="javascript:void(0);">
        <span>
            Audio
        </span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="" href="{{url('admin/add-audio')}}">
                <span>
                    Add Audio
                </span>
            </a>
        </li>
        <li>
            <a class="" href="{{url('admin/manage-audio')}}">
                <span>
                    Manage Audio
                </span>
            </a>
        </li>
    </ul>
</li>
--}}
<!-- ####################333###  Posted Comments   ###################333333 -->
{{--
<li id="mnu-comment">
    <a class="menu-toggle" href="javascript:void(0);">
        <span>
            Posted Comments
        </span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="" href="{{url('admin/manage-comments')}}">
                <span>
                    manage Comments
                </span>
            </a>
        </li>
    </ul>
</li>
--}}
