<?php
namespace App\Controllers\Admin;
 
use App\Models\Agegroup;
use App\Services\Validators\AgegroupValidator;
use Image,Input, Notification, Redirect, Sentry, Str;
 
class AgegroupsController extends \BaseController {
 
    public function index()
    {
        return \View::make('admin.agegroups.index')->with('agegroups', Agegroup::all());
    }
 
    public function show($id)
    {
        return \View::make('admin.agegroups.show')->with('agegroup',Agegroup::find($id));
    }
 
    public function create()
    {
        return \View::make('admin.agegroups.create');
    }
 
    public function store()
    {
        $validation = new AgegroupValidator;
 
        if ($validation->passes())
        {
            $agegroup = new Agegroup;
            $agegroup->title   = Input::get('title');
            $agegroup->slug    = Str::slug(Input::get('title'));
            $agegroup->start_age    = Input::get('start_age');
            $agegroup->end_age    = Input::get('end_age');
            $agegroup->user_id = Sentry::getUser()->id;
            $agegroup->save();
			
            Notification::success('The Age Group was saved.');
 
            return Redirect::route('admin.agegroups.edit', $agegroup->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }
 
    public function edit($id)
    {
        return \View::make('admin.agegroups.edit')->with('agegroup', Agegroup::find($id));
    }
 
    public function update($id)
    {
         $validation = new AgegroupValidator;
 
        if ($validation->passes())
        {
            $agegroup =  Agegroup::find($id);
            $agegroup->title   = Input::get('title');
            $agegroup->slug    = Str::slug(Input::get('title'));
            $agegroup->start_age    = Input::get('start_age');
            $agegroup->end_age    = Input::get('end_age');
            $agegroup->user_id = Sentry::getUser()->id;
            if($agegroup->start_age >= $agegroup->end_age){
                return Redirect::back()->withInput()->withErrors('Please make End Age greater than Start Age');
            }
            $agegroup->save();
			
            Notification::success('The Age Group was saved.');
 
            return Redirect::route('admin.agegroups.edit', $agegroup->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }
 
    public function destroy($id)
    {
        $agegroup = Agegroup::find($id);
        $agegroup->delete();
 
        Notification::success('The Agegroup was deleted.');
 
        return Redirect::route('admin.agegroups.index');
    }
 
}