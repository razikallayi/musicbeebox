<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Models\Address;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
      return view('auth.register');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

     $validator = Validator::make($data, [
                                  'name'=> 'required',
                                  'email'=> 'required|email|unique:users',
                                  'username'=> 'required|unique:users',
                                  'password'=> 'required|min:6|confirmed',
                                  'house_no'=> 'required',
                                  'street'=> 'required',
                                  'address'=> 'required',
                                  'city'=> 'required',
                                  'postcode'=> 'required',
                                  // 'months'=> 'required',
                                  ]);

     return $validator;
   }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
       $user  = User::create([
                             'name' => $data['name'],
                             'email' => $data['email'],
                             'username' => $data['username'],
                             'password' => bcrypt($data['password']),
                             'is_payed' => false,
                             ]);
       Address::create([
                       'name' => $user->name,
                       'user_id'  => $user->id,
                       'house_no' => $data['house_no'],
                       'street' => $data['street'],
                       'address' => $data['address'],
                       'city' => $data['city'],
                       'postcode' => $data['postcode'],
                       'is_primary' => true,
                       'is_billing' => true,
                       'is_shipping' => true,
                       'is_active' => true,
                       ]);
     return $user;
   }

}
