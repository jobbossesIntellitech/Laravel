<?php
namespace App\Controllers\Admin;
 
use App\Models\User;
use App\Services\Validators\UserValidator;
use Input, Redirect, Sentry, Str;
use Notification;
 
class UsersController extends \BaseController {
 
        public function index()
        {
           
                return \View::make('admin.users.index')->with('users', User::all());
        }
 
        public function show($id)
        {
            
                return \View::make('admin.users.show')->with('user', User::find($id));
        }
 
        public function create()
        {
                
                return \View::make('admin.users.create');
        }
 
        public function store()
        {	
                $validation = new UserValidator;
                
                if($validation->passes()):
                
                try
                    {
                        // Create the user
                        $user = Sentry::createUser(array(
                            'email'     => Input::get('email'),
                            'password'  => Input::get('password'),
                            'first_name'  => Input::get('first_name'),
                            'last_name'  => Input::get('last_name'),
                            'activated' => true,
                        ));
                        // Find the group using the group id
                        $adminGroup = Sentry::findGroupByName('admin');

                        // Assign the group to the user
                        $user->addGroup($adminGroup);
                        return Redirect::route('admin.users.index');
                    }
                    catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
                    {
                        Notification::success('Login field is required.');
                    }
                    catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
                    {
                        Notification::success('Password field is required.');   
                    }
                    catch (\Cartalyst\Sentry\Users\UserExistsException $e)
                    {
                        Notification::success('User with this login already exists.');                        

                    }
                    catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
                    {
                        Notification::success('Group was not found.');
                        
                    }

                    return Redirect::route('admin.users.index');
                else :
                  return Redirect::back()->withInput()->withErrors($validation->errors);  
            endif;
        }
 
        public function edit($id)
        {
              
                return \View::make('admin.users.edit')->with('user', user::find($id));
        }
 
        public function update($id)
        {
//				$validation = new PageValidator;
// 
//                if ($validation->passes())
//                {
//                        $page = Page::find($id);
//                        $page->title = Input::get('title');
//                        $page->slug = Str::slug(Input::get('title'));
//                        $page->body = Input::get('body');
//                        $page->user_id = Sentry::getUser()->id;
//                        $page->save();
// 
//                        Notification::success('The page was saved.');
// 
//                        return Redirect::route('admin.pages.edit', $page->id);
//                }
// 
//                return Redirect::back()->withInput()->withErrors($validation->errors);
                /*$page = Page::find($id);
                $page->title = Input::get('title');
                $page->slug = Str::slug(Input::get('title'));
                $page->body = Input::get('body');
                $page->user_id = Sentry::getUser()->id;
                $page->save();
 
                return Redirect::route('admin.pages.edit', $page->id);*/
        }
 
        public function destroy($id)
        {
                $user = User::find($id);
                $user->delete();
 
                return Redirect::route('admin.users.index');
        }
 
        public function groups(){
            
        }
}