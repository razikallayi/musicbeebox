<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;
use Session;
use Redirect;
use Validator;
use App\Models\Video;
//use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        return view('user.dashboard');
    }

    /**
     * Show the subscribe form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSubscribeForm()
    {
        return view('user.subscribe');
    }


    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showVideos($id)
    {
        if($id == 3 && auth()->user()->three_months){
            return view('user.videos-3');
        }
        if($id == 6 &&  auth()->user()->six_months){
            return view('user.videos-6');
        }
        if($id == 12 && auth()->user()->three_months){
            return view('user.videos-12');
        }
        return $this->showDashboard();
    }


        /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function upgradePlan($id)
    {
        auth()->user()->upgrade($id);
        return $this->showVideos($id);
    }


        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function myAccount()
        {
            $user= auth()->user();
            if($user == null){return;}
           return view('user.my-account',compact('user'));
        }


        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function updateAccount(Request $request)
        {
            $this->middleware('auth');
            if(!auth()->guard('auth')->user()){return;}

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'username' => ['required','max:255',Rule::unique('admins')->ignore($request->user('admin')->id)],
                'email' => ['required','email','max:255',Rule::unique('admins')->ignore($request->user('admin')->id)],
                'current_password' => 'required|max:255',
                'new_password' => 'required|min:6|confirmed',
            ]);

            $validator->after(function($validator) use($request){
                if (!Hash::check($request->current_password, $request->user('admin')->password)) {
                    $validator->errors()->add('current_password', 'Current password is invalid.');
                }
            });
            
            $validator->validate();
            $user = auth()->guard('auth')->user();
            $user->name= $request->name;
            $user->username= $request->username;
            $user->email= $request->email;
            $user->password= Hash::make($request->new_password);
            $user->save();
            return view('admin.my-account',compact('user'));
        }



    // ################## subscription ####################### //



    // public function subscribe(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //        'name'=> 'required',
    //        'email'=> 'required|email|unique:users',
    //        'username'=> 'required|unique:users',
    //        'password'=> 'required|min:6|confirmed',
    //        'house_no'=> 'required',
    //        'street'=> 'required',
    //        'address'=> 'required',
    //        'city'=> 'required',
    //        'postcode'=> 'required',
    //        'months'=> 'required',
    //        ])->validate();

    //     $user = $this->createUser($request->all());

    //     $this->guard()->login($user);

    //     dd(auth()->user());
    // }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    // protected function createUser(array $data)
    // {
    //     $three = $six = $twelve = false;
    //     foreach ($data['months'] as $key => $months) {
    //         if($months == 3){
    //             $three = true;
    //         }
    //         if($months == 6){
    //             $six = true;
    //         }
    //         if($months == 12){
    //             $twelve = true;
    //         }

    //     }
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'username' => $data['username'],
    //         'password' => bcrypt($data['password']),
    //         'house_no' => $data['house_no'],
    //         'street' => $data['street'],
    //         'address' => $data['address'],
    //         'city' => $data['city'],
    //         'postcode' => $data['postcode'],
    //         '3_months' => $three,
    //         '6_months' => $six,
    //         '12_months' => $twelve,
    //     ]);
    // }

     // ############################ subscription confirmation ###################### //

    public function confirmSubscription($token)
    {

        $user = new User;
        $result = $user->confirmSubscriptions($token);
        if($result == $token)
        {
            $user->replyMails($token);
        }
        return Redirect::to('/');
    }

    // ########################## unsubscribe ############################## //

    public function unSubscribe($token)
    {
        $user = new User;
        $result = $user->goUnsubscribe($token);
        if($result == $token)
        {
            $user->unSubscribeMails($token);
        }
        return Redirect::to('/');

    }

	// ############### manage users ######################## //

    public function manageUsers()
    {
    	$user = new User;
    	$result = $user->getUsers();

    	return view('admin.users.manage-users',['users'=>$result]);
    }

    // ################### edit users ####################### //


    public function editUser($id=null)
    {
    	$user = new User;
    	$result = $user->getUsers($id);
    	return view('admin.users.edit-users',['results'=>$result]);
    }


    // ###################### update user ########################## //

    public function updateUser(Request $request)
    {

    	$user = new User;
    	$user->updateUsers($request);
    	return back();
    }


    // ############################# delete user ########################### //


    public function deleteUser($id)
    {
    	$user = new User;
    	$user->deleteUsers($id);
    	return back();
    }


    // ##############################sign out ############################### //


    public function sign_out()
    {
       Auth::logout();
       Session::flush();
       return Redirect::to('/');
   }


 // ################################ credentials create ##################### //

   public function createCredentials($token)
   {
    return view('beebox.login-credentials.create-credentials',['token'=>$token]);
}

 // ################################ save credentials ######################## //

public function saveCredentials(Request $request)
{
    $user = new User;
    $user->saveLoginCredentials($request);
    return Redirect::to('/');
}


 // #################################### send newsletter   ################################# //

public function sendNewsletter($token)
{

    $user = new User;
    $result = $user->goNewsletter($token);
    //if($result == $token)
}



}
