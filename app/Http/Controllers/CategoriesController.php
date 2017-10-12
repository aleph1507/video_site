<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoriesController extends Controller
{
    //
    public function store(Request $request){
    	$this->validate($request, [
    		'name' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/'
    	]);

    	$c = new Category;
    	$c->name = $request->name;
    	$c->save();
    	Session::flash('success', "Category saved.");
    	return redirect('/');
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Category updated.');
        return redirect('/admin');
    }

    public function delete($id){
        $dc = Category::find($id);
        $dc->videos()->detach();
        $dc->delete();
        Session::flash('success', 'Category deleted.');
        return redirect('/admin');
    }
}
