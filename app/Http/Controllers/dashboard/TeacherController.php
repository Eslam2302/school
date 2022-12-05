<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Activitylog\Models\Activity;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function __construct() 
    {

       $this->middleware(['permission:teachers_create'])->only('create');
       $this->middleware(['permission:teachers_update'])->only('edit');
    }



    public function create()
    {

        return view('dashboard.users.create_teacher');
    
    }//end of create

    public function store(Request $request)
    {

        $request->validate([
            
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_of_join' => 'required',
            'image' => 'image',
            //'permissions' => 'required',

        ]);
       

        $requests_data = $request->except(['password', 'password_confirmation', 'permissions','image']);
        $requests_data['password'] = bcrypt($request->password);

        if($request->image) {

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/user_images/' . $request->image->hashName()));

            $requests_data['image'] = $request->image->hashName(); 

        }

        $user = User::create($requests_data);
        $user->attachRole('teacher');
        //$user->syncPermissions($request->permissions);

        return redirect()->route('dashboard.users.index');

    }//end of store

    

    
}
