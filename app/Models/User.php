<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\SubscriptionForm;
use App\Mail\ReplyMail;
use App\Mail\UnsubscribeMail;
use Mail;
use Session;

class User extends Authenticatable
{
  use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name','username','email','password','is_payed','created_at','updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    /**
     * Get the addresses of the user.
     */
    public function addresses()
    {
      return $this->hasMany('App\Models\Address')->get();
    }

     /**
     * Get the orders of the user.
     */
    public function orders()
    {
      return $this->hasMany('App\Models\Order')->get();
    }

     /**
     * Get the subscriptions of the user.
     */
    public function subscriptions()
    {
      return $this->hasMany('App\Models\Subscription')->get();
    }


    /**
     * Get the addresses of the user.
     */
    public function getPrimaryAddress()
    {
      return $this->addresses()->where('is_primary', true)->first();
    }

    /**
     * Get the addresses of the user.
     */
    public function getBillingAddress()
    {
      return $this->addresses()->where('is_billing', true)->first();
    }

    /**
     * Get the addresses of the user.
     */
    public function getShippingAddress()
    {
      return $this->addresses()->where('is_shipping', true)->first();
    }



    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function upgrade($plan)
    {
        switch($plan){
          case 3:
            $this->three_months = true;
            break;
          case 6:
            $this->six_months = true;
          break;
          case 12:
            $this->twelve_months = true;
          break;
        }
        $this->save();
        return;
    }

    /**
     * check any more plans to upgrade
     *
     * @param  string  $token
     * @return void
     */
    public function isUpgradable()
    {

        return !($this->three_months || $this->six_months = true|| $this->twelve_months);
    }

    


    // ######################## add user ############################## //

    public function goSubscribe($request)
    {  
      $checkemail = $this->checkEmails($request);
      if($checkemail == true)
      {
        $subscribetoken = md5($request->email); // token for subscription 

        $password = $this->generatePasswords();
        $username = $this->generateUsernames();
        $user = new User;
        $user->username = $username;
        $user->password = bcrypt($password);
        $user->name = $request->names;
        $user->email = $request->email;
        $user->length = $request->length;
        $user->house_no = $request->house_no;
        $user->street = $request->street;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->post_code = $request->postcode;
        $user->subscribe_token = $subscribetoken;
        $user->role = "user";
        $user->save();


        Mail::to($user->email)  //SubscriptionForm::DESTINATION_EMAIL
      ->send(new SubscriptionForm($user,$password)); //$request
     // return view('emails.subscribe-form')->with(['request'=> $request]);
      if( count(Mail::failures()) > 0 ) 
      {
        return response()->json(["status"=>"failed"]);
      } else {
        return response()->json(["status"=>"success"]);
      }
    }
    
    else if($checkemail == false)
    {

      return false;
    }
  }

    // ######################### generate passwords ####################### //

  public function generatePasswords()
  {
    $generatedpass = str_random(8);
    return $generatedpass;
  }

    // ################# generate passwords ############################# //

  public function generateUsernames()
  {
   $start = 'UNM';
   $characters = array_merge(range('A','Z'), range('0','9'));
   for ($i = 0; $i < 6; $i++) {
    $rand = mt_rand(0, count($characters)-1);
    $start .= $characters[$rand];
  }
  return $start;
}

  // ################### checking email with database ###################//

public static function checkEmails($request)
{
  $result = self::where('email',$request->email)->first();
  if($result)
  {
   return false;
 }
 else
 {
  return true;
}

}


// ################## subscription confirmation ######################### //


public  function confirmSubscriptions($token)
{

  $res = self::where('subscribe_token',$token)->first(); 
  if($res->subscribe_token)
  {
   $user = User::findOrFail($res->id);
   $user->is_checked = "Y";
   $user->is_cancelled = "N";
   $user->save();
   return $token;
 }
 else
 {
  return false;
}

}

// ############################ reply after subscription ####################### //

public function replyMails($token)
{

  $user = User::where('subscribe_token',$token)->first();
  Mail::to($user->email)  // ReplyMail::DESTINATION_EMAIL
      ->send(new ReplyMail($user)); //$request
    }


// ########################## unsubscribe ################################# //

    public function goUnsubscribe($token)
    {
      $res = self::where('subscribe_token',$token)->first();
      if($res->subscribe_token)
      {
        $user = User::findOrFail($res->id);
        $user->is_checked= "N";
        $user->is_cancelled = "Y";
        $user->save();
        return $token;
      }
      else
      {
        return false;
      }

    }

    // ################################ unsubscribe mails ############################# //

    public function unSubscribeMails($token)
    {
      $user = User::where('subscribe_token',$token)->first();
      Mail::to($user->email)  // UnsubscribeMail::DESTINATION_EMAIL
      ->send(new UnsubscribeMail($user)); //$request
    }

    // #################### manage users ########################### //


    public static function getUsers($id=null)
    {
      if($id == null)
      {
        return static::where('email','<>','admin@whytecreations.com')->get();

      }
      else
      {
        return static::findOrFail($id);
      }
    }


    // ###################### update user ########################## //

    public function updateUsers($request)
    {
      $user = User::findOrFail($request->id);
      if($request->is_checked == "Y")
      {
        $checked = "Y";
      }
      else
      {
        $checked = "N";
      }
      //$user->username = $request->username;
      $user->email = $request->email;
      //$user->password = $request->password;

      //$user->is_checked = $checked;
     // $user->role = $request->role;

      $user->length = $request->length;
      $user->house_no = $request->house_no;
      $user->street = $request->street;
      $user->address = $request->address;
      $user->city = $request->city;
      $user->post_code = $request->postcode;
      $user->save();
      return true;
    }

    // ########################### deelete users ###################### //


    public function deleteUsers($id)
    {
      $user = User::findOrFail($id);
      $user->delete();
      return true;
    }

    // ########################### login details create here ################### //

    public function saveLoginCredentials($request)
    {
      User::where('subscribe_token', $request->token)
      ->update(['username' => $request->username , 'password' => bcrypt($request->confirm_password) , 'is_checked' => 'Y' , 'is_cancelled' => 'N']);
      return true;
    }

    // ####################### go newsletter $##################################

    public function goNewsletter($token)
    {
       dd($token);
    }

    
    





  }
