<?php
namespace App\Controllers\Admin;
 
use App\Models\Slider;
use App\Services\Validators\SliderValidator;
use Image,Input, Notification, Redirect, Sentry, Str;

class SliderController extends \BaseController {
    
     public function index()
    {
        return \View::make('admin.slider.index')->with('sldiers', slider::all());
    }
 
    public function show($id)
    {
        return \View::make('admin.slider.show')->with('slider',Slider::find($id));
    }
 
    public function create()
    {
        return \View::make('admin.slider.create');
    }
 
    public function store()
    {
        $validation = new SliderValidator;
 
        if ($validation->passes())
        {
            $slider = new Slider;
            $slider->title   = Input::get('title');
            $slider->slug    = Str::slug(Input::get('title'));
            $slider->save();
			// Now that we have the article ID we need to move the image
			if (Input::hasFile('image'))
			{
				$slider->image = Image::upload(Input::file('image'), 'Sliders/' . $slider->id);
				$slider->save();
			}
            Notification::success('The Slide was saved.');
 
            return Redirect::route('admin.slider.edit', $slider->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }
 
    public function edit($id)
    {
        return \View::make('admin.slider.edit')->with('slider', Slider::find($id));
    }
 
    public function update($id)
    {
        $validation = new SliderValidator;
 
        if ($validation->passes())
        {
            $slider = Article::find($id);
            $slider->title   = Input::get('title');
            $slider->slug    = Str::slug(Input::get('title'));
			
			if (Input::hasFile('image')) $slider->image   = Image::upload(Input::file('image'), 'sliders/' . $slider->id);
            $slider->save();
 
            Notification::success('The Slider was saved.');
 
            return Redirect::route('admin.slider.edit', $slider->id);
        }
 
        return Redirect::back()->withInput()->withErrors($validation->errors);
    }
 
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
 
        Notification::success('The slider was deleted.');
 
        return Redirect::route('admin.slider.index');
    }
}

