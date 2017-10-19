<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Session;
use File;

class SettingsController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function store_sections_style(Request $request){
        $settings = Settings::first() ? Settings::first() : new Settings;
        $bg_sections_color = "";
        $bg_sections_alpha = "1";
        $bg_sections_alpha = $request->bg_alpha_opacity ? $request->bg_alpha_opacity/10 : 0.9;

        $settings->fg_sections = $request->fg_sections ? "color:$request->fg_sections;" : "color:#333;";

        if($request->bg_sections_color){
            list($r, $g, $b) = sscanf($request->bg_sections_color, "#%02x%02x%02x");
            // $settings->bg_sections = $request->bg_sections_color;
            $bg_sections_color = 'background:rgba(' . $r . ',' . $g . ','. $b . ',' . $bg_sections_alpha . ');';
            // return $bg_sections_color;
        }

        if($request->gradient == 'topdown'){
            $bg_sections_color .= "background: -webkit-linear-gradient($request->bg_sections_color, $request->gradientcolor);";
            $bg_sections_color .= "background: -o-linear-gradient($request->bg_sections_color, $request->gradientcolor);";
            $bg_sections_color .= "background: -moz-linear-gradient($request->bg_sections_color, $request->gradientcolor);";
            $bg_sections_color .= "background: linear-gradient($request->bg_sections_color, $request->gradientcolor);";
        }

        if($request->gradient == 'leftright'){
            $bg_sections_color .= "background: -webkit-linear-gradient(left, $request->bg_sections_color, $request->gradientcolor);";
            $bg_sections_color .= "background: -o-linear-gradient(right, $request->bg_sections_color, $request->gradientcolor);";
            $bg_sections_color .= "background: -moz-linear-gradient(right, $request->bg_sections_color, $request->gradientcolor);";
            $bg_sections_color .= "background: linear-gradient(to right, $request->bg_sections_color, $request->gradientcolor);";
        }

        if($request->gradient == 'diagonal'){
            $bg_sections_color .= "background: -webkit-linear-gradient(left top, $request->bg_sections_color, $request->gradientcolor);";
            $bg_sections_color .= "background: -o-linear-gradient(bottom right, $request->bg_sections_color, $request->gradientcolor);";
            $bg_sections_color .= "background: -moz-linear-gradient(bottom right, $request->bg_sections_color, $request->gradientcolor);";
            $bg_sections_color .= "background: linear-gradient(to bottom right, $request->bg_sections_color, $request->gradientcolor);";
        }

        $settings->bg_sections = $bg_sections_color;

        $settings->save();

        Session::flash('success', 'Section colors saved!');

        return redirect('/admin');
    }

    public function store_header_style(Request $request){
        $settings = Settings::first() ? Settings::first() : new Settings;
        $header_background = "";
        $header_bg_alpha = $request->header_bg_alpha ? $request->header_bg_alpha/10 : 0.5;
        if($request->header_background){
            list($r, $g, $b) = sscanf($request->header_background, "#%02x%02x%02x");
            $settings->header_background = "background: rgba($r,$g,$b,$header_bg_alpha);";
        }
        $settings->header_color = $request->header_color ? "color:" . $request->header_color . ";" : "";

        $settings->save();

        Session::flash('success', 'Header style saved!');

        return redirect('/admin');
    }

    public function store_mission_style(Request $request){
        $settings = Settings::first() ? Settings::first() : new Settings;

        $settings->mission_color = $request->mission_color ? "color:" . $request->mission_color . ';' : "";
        $mission_bg_alpha = $request->mission_bg_alpha ? $request->mission_bg_alpha/10 : 0.5;
        $mission_background = "";
        if($request->mission_background){
            list($r, $g, $b) = sscanf($request->mission_background, "#%02x%02x%02x");
            $settings->mission_background = "background: rgba($r,$g,$b,$mission_bg_alpha);";
        }

        $settings->save();

        Session::flash('success', 'Mission style saved!');

        return redirect('/admin');
    }

    public function store(Request $request){
    	$this->validate($request, [
    		'header' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
    		'mission' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
    		'bgvid' => 'sometimes|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',

    	]);

        // return $request->gradientcolor;
    	$settings = Settings::first() ? Settings::first() : new Settings;
    	if($request->header)
    		$settings->header = $request->header;
    	if($request->mission)
    		$settings->mission = $request->mission;
    	if($request->bgvid_tint)
    		$settings->bgvid_tint = $request->bgvid_tint;

        // return $bg_sections_color;
        

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
