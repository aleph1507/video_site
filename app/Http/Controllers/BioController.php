<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bio;
use File;
use Image;
use Session;

class BioController extends Controller
{
    //
	public function store(Request $request, $id){
		$this->validate($request, [
			'name' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
			'education' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
			'working_since' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
			'fav_tech' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
			'address' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
			'biography' => 'sometimes|regex:/(^[A-Za-z0-9 ]+$)+/',
			'profile_pic' => 'sometimes|image'
		]);

		$b = Bio::find($id) ? Bio::find($id) : new Bio;

		// $b = new Bio;
		if($request->name)
			$b->name = $request->name;
		if($request->education)
			$b->education = $request->education;
		if($request->working_since)
			$b->working_since = $request->working_since;
		if($request->fav_tech)
			$b->fav_tech = $request->fav_tech;
		if($request->address)
			$b->address = $request->address;
		if($request->biography)
			$b->biography = $request->biography;
		if($request->profile_pic){
			$picture = $request->file('profile_pic');

			if(!File::exists(public_path() . '/profile_picture'))
				File::makeDirectory(public_path() . '/profile_picture/');

			$pic_filename = time() . '.' . $picture->getClientOriginalExtension();
			$pic_location = public_path() . '/profile_picture/' . $pic_filename;

			Image::make($picture)->fit(180,180)->save($pic_location);

			$b->profile_pic = $pic_filename;
		}

		$b->save();
		Session::flash('success', 'Biography updated.');

		return redirect('/admin');
	}
}
