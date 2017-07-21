<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Video;
use Validator;
use Illuminate\Support\Facades\Session;
use Input;
use Illuminate\Support\Facades\Redirect;
class VideoController extends Controller
{


// ########################	index page ####################### //


	public function addVideos()
	{
		return view('admin.video.add-video');
	}

//	################ upload videos ######################## //


	public function uploadVideos(Request $request)
	{
		$this->validate($request,[
			'title' => 'required' ,
			'description' => 'required' ,
			'videos' => 'required' ,
			'subcribe_month' => 'required' ,
			]);
		$video = new Video;
		if(!is_null($request->videos))
		{
			$upload = $request->videos;
			$up_video = $this->upload_video($upload);

		}
		$video->addVideos($request,$up_video);
		return back();

	}

// ################# Uploading video to the location ######################## //

	public function upload_video($upload)
	{
		if(Input::file('videos')->isValid()) 
		{

			$extension = Input::file('videos')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'.'.$extension;
			if(Input::file('videos')->move(Video::VIDEO_LOCATION, $fileName))
			{

				Session::flash('msg', 'Your Video is successfully Uploaded  !!!');
				return $fileName;
			}
			else
			{
				Session::flash('error', 'Oops... Video Uploading Failed !!! Try again..');
				return Redirect::to('/admin/upload-video');
			}

		}
		else 
		{

			Session::flash('upload_error', 'uploaded file is not valid');

		}
	}


	// ######################## manage video ############################ //

	public function manageVideo()
	{
		$video = new Video;
		$result = $video->getVideo();
		return view('admin.video.manage-video',['videos'=>$result]);
	}

	// ############################## edit video ########################### //

	public function editVideo($id=null)
	{
		$video = new Video;
		$result = $video->getVideo($id);
		
		return view('admin.video.edit-video',['results' => $result]);
	}


	// ######################## update video ########################### //

	public function updateVideo(Request $request)
	{
		$this->validate($request,[
			'title' => 'required' ,
			'description' => 'required' ,
			//'videos' => 'required' ,
			'subcribe_month' => 'required' ,
			]);

		$video = new Video;
		if(!is_null($request->videos))
		{
			$upload = $request->videos;
			$up_video = $this->upload_video($upload);

		}
		$result = $video->update_video($request,@$up_video);
		return back();
	}


	// ###################### delete video ################################# //


	public function deleteVideo($id)
	{
		$video = new Video;
		$video->delete_video($id);
		return back();
	}


}
