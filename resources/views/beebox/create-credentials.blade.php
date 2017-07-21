@extends('auth.layout')

@section('body-name','login-page')

@section('content')
<div class="card">
    <div class="body">
       <form class="form-horizontal" id="credentials" method="POST" action="{{ url('/save-credentials') }}">
        {{ csrf_field() }}

        <div class="msg"><p class="lead text-center">Login Credentials</p></div>

        <input type="hidden" name="token" value="{{$token}}">

        <div class="form-group p-l-20">
            <label for="username" class="control-label">Username</label>
            <div class="input-group">

                <div class="form-line">
                    <input type="text" class="form-control" name="username" required autofocus>
                </div>
            </div>

        </div>

        <div class="form-group p-l-20">
            <label for="username" class="control-label">New Password</label>
            <div class="input-group">

                <div class="form-line">
                    <input type="text" class="form-control" id="new" name="new_password" required autofocus>
                </div>
            </div>

        </div>

        <div class="form-group p-l-20 ">

            <label for="password" class="control-label">Confirm Password</label>
            <div class="input-group">

                <div class="form-line">
                    <input type="password" class="form-control" id="confirm" name="confirm_password"  required>

                </div>
                <span id="s_validate"></span>
            </div>

        </div>


        <div class="row">

            <div class="col-xs-4">
                <input type="submit" name="create"  onclick="return validate()" value="Save Credentials">

            </div>
        </div>
        <div class="row m-t-15 m-b--20">


        </div>
    </form>
</div>
</div>
@endsection


@section('scripts')
@parent

<script type="text/javascript">

   function validate()
   {
    var newpass = document.getElementById('new').value;
    var confirmpass = document.getElementById('confirm').value;
    if(newpass != confirmpass)
    {
        document.getElementById('credentials').disabled = 'disabled';
        document.getElementById('s_validate').innerHTML=" Passwords are not matching !!!";
        return false; 
    }
    else
    {
        document.getElementById('s_validate').innerHTML="Passwords are matching ...";
        document.getElementById('credentials').submit();
        return true;
    }
}

</script>

@endsection