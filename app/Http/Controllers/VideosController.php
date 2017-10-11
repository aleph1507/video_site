<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;
use Session;
use Image;
use File;

class VideosController extends Controller
{
    public function store(Request $request){
    	$this->validate($request, [
    		'video' => 'required|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
    		'poster' => 'sometimes|image'
    	]);

    	$v = new Video;
    	if($request->title)
    		$v->title = $request->title;
    	if($request->description)
    		$v->description = $request->description;
    	$v->category_id = $request->category_id;
	
		if(!File::exists(public_path() . '/videos'))
    		File::makeDirectory(public_path() . 'videos');

    	if($request->poster){
    		$poster = $request->file('poster');

    		if(!File::exists(public_path() . '/videos/posters'))
    			File::makeDirectory(public_path() . 'videos/posters');

    		$posterfilename = time() . '.' . $poster.getClientOriginalExtension();
    		$posterlocation = public_path() . '/videos/posters/' . $posterfilename;

    		Image::make($poster)->fit(300,300)->save($posterlocation);
    		$v->poster = $posterfilename;
    	}

    	$video = $request->file('video');
    	$file = time() . '.' . $video->getClientOriginalExtension();
    	$location = public_path() . '/videos';
    	$v->filename = $file;

    	$video->move($location, $file);

    	$v->save();

    	Session::flash('success', 'Video uploaded.');

    	return redirect('/');

    }
}
