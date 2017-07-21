<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\Video;

class MasterController extends Controller
{

    public function index()
    {
    	return view('beebox.index');
    }


    // // ################## about us ####################### //

    public function about_us()
    {
        return view('beebox.about-us');
    }


    // // ################## terms ####################### //

    public function terms()
    {
        return view('beebox.terms');
    }

    // #################### contact us ##################### //

    public function contact_us()
    {
        return view('beebox.contact-us');
    }


    public function subscriptionForm(Request $request)
    {
        return view('beebox.subscribe');
    }




    // ######################## login ###################### //

    public function userVideo()
    {
        
        $video = new Video;
        $result = $video->getVideo();
        return view('beebox.uservideo',['videos' => $result]);
    }
}
