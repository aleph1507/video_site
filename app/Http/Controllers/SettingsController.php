<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Session;
use File;

class SettingsController extends Controller
{
    //
    public function store(Request $request){
    	$this->validate($request, [
    		'header' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
    		'mission' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
    		'bgvid' => 'sometimes|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',

    	]);

    	$settings = Settings::first() ? Settings::first() : new Settings;

    	if($request->header)
    		$settings->header = $request->header;
    	if($request->mission)
    		$settings->mission = $request->mission;
    	if($request->bgvid_tint)
    		$settings->bgvid_tint = $request->bgvid_tint;

    	if($request->bgvid){
    		if(!File::exists(public_path() . '/bgvid'))
    			File::makeDirectory(public_path() . '/bgvid/');

    		if(File::exists(public_path() . '/bgvid/bgvid.mp4'))
    			File::delete(public_path() . '/bgvid/bgvid.mp4');

			$bgvid = $request->file('bgvid');

			$filename = 'bgvid.mp4';
			$location = public_path() . '/bgvid';

			$settings->bgvid = $filename;

            $bgvid->move($location, $filename);
        }

		$settings->save();

		Session::flash('success', 'Settings updated.');

		return redirect('/admin');
    }
}
