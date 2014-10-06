<?php
namespace App\Controllers\Admin;
 
use App\Models\Skill;
use App\Services\Validators\SkillsValidator;
use Image,Input, Notification, Redirect, Sentry, Str;
 
class SkillsController extends \BaseController {
 
    public function index()
    {
        return \View::make('admin.skills.index')->with('skills', Skill::all());
    }
 
    public function show($id)
    {
        return \View::make('admin.skills.show')->with('skill',Skill::find($id));
    }
 
    public function create()
    {
        return \View::make('admin.skills.create');
    }
 
    public function store()
    {
        $validation = new SkillsValidator;
 
        if ($validation->passes())
        {
            $skill = new Skill;
            $skill->title   = Input::get('title');
            $skill->slug    = Str::slug(Input::get('title'));
            $skill->level    = Input::get('level');
            $skill->user_id = Sentry::getUser()->id;
            $skill->save();
			
            Notification::success('The Skill Level saved.');
 
            return Redirect::route('admin.skills.edit', $skill->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }
 
    public function edit($id)
    {
        return \View::make('admin.skills.edit')->with('skill', Skill::find($id));
    }
 
    public function update($id)
    {
         $validation = new SkillsValidator;
 
        if ($validation->passes())
        {
            $skill =  Skill::find($id);
            $skill->title   = Input::get('title');
            $skill->slug    = Str::slug(Input::get('title'));
            $skill->level    = Input::get('level');
            $skill->user_id = Sentry::getUser()->id;
            $skill->save();
			
            Notification::success('The Skill Level saved.');
 
            return Redirect::route('admin.skills.edit', $skill->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }
 
    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
 
        Notification::success('The Skill level was deleted.');
 
        return Redirect::route('admin.skills.index');
    }
 
}