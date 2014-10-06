<?php
namespace App\Controllers\Admin;
 
use App\Models\Sport;
use App\Services\Validators\SportValidator;
use Image,Input, Notification, Redirect, Sentry, Str;

class SportsController extends \BaseController {
    
     public function index()
    {
        return \View::make('admin.sports.index')->with('sports', sport::all());
    }
 
    public function show($id)
    {
        return \View::make('admin.sports.show')->with('sport',sport::find($id));
    }
 
    public function create()
    {
        return \View::make('admin.sports.create');
    }
 
    public function store()
    {
        $validation = new SportValidator;
 
        if ($validation->passes())
        {
            $sport = new Sport;
            $sport->title   = Input::get('title');
            $sport->slug    = Str::slug(Input::get('title'));
            $sport->body    = Input::get('body');
            $sport->user_id = Sentry::getUser()->id;
            $sport->save();
			// Now that we have the article ID we need to move the image
			if (Input::hasFile('image'))
			{
				$sport->image = Image::upload(Input::file('image'), 'Sports/' . $sport->id);
				$sport->save();
			}
            Notification::success('The Slide was saved.');
 
            return Redirect::route('admin.sports.edit', $sport->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }
 
    public function edit($id)
    {
        return \View::make('admin.sports.edit')->with('sport', sport::find($id));
    }
 
    public function update($id)
    {
        $validation = new SportValidator;
 
        if ($validation->passes())
        {
            $sport = Sport::find($id);
            $sport->title   = Input::get('title');
            $sport->slug    = Str::slug(Input::get('title'));
            $sport->body    = Input::get('body');
            $sport->user_id = Sentry::getUser()->id;
			
            if (Input::hasFile('image')) $sport->image   = Image::upload(Input::file('image'), 'sliders/' . $sport->id);
            
            $sport->save();
 
            Notification::success('The Sport was saved.');
 
            return Redirect::route('admin.sports.edit', $sport->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }
 
    public function destroy($id)
    {
        $sport = Sport::find($id);
        $sport->delete();
 
        Notification::success('The Sport was deleted.');
 
        return Redirect::route('admin.sports.index');
    }
}