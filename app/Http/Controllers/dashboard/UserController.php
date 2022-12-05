<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Function That secure the permissions route for crud
    public function __construct()
    {
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_create'])->only('create');
        $this->middleware(['permission:users_update'])->only('edit');
        $this->middleware(['permission:users_delete'])->only('destroy');
    }

    public function index(Request $request)
    {
        //all users
        $users = User::all();

        // Get All Admins for search and show them in Admins Table
        $admins = User::whereRoleIs('admin')
            ->where(function ($q) use ($request) {
                return $q->when($request->search_admin, function ($query) use ($request) {
                    return $query
                        ->where('first_name', 'like', '%' . $request->search_admin . '%')
                        ->orwhere('second_name', 'like', '%' . $request->search_admin . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search_admin . '%')
                        ->orwhere('phone', 'like', '%' . $request->search_admin . '%')
                        ->orwhere('email', 'like', '%' . $request->search_admin . '%');
                });
            })
            ->latest()
            ->paginate(5);

        // Get All Teachers for search and show them in Teachers Table
        $teachers = User::whereRoleIs('teacher')
            ->where(function ($q) use ($request) {
                return $q->when($request->search_teacher, function ($query) use ($request) {
                    return $query
                        ->where('first_name', 'like', '%' . $request->search_teacher . '%')
                        ->orwhere('second_name', 'like', '%' . $request->search_teacher . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search_teacher . '%')
                        ->orwhere('phone', 'like', '%' . $request->search_teacher . '%')
                        ->orwhere('email', 'like', '%' . $request->search_teacher . '%');
                });
            })
            ->latest()
            ->paginate(5);

        // Get All Students for search and show them in Students Table
        $students = User::whereRoleIs('student')
            ->where(function ($q) use ($request) {
                return $q->when($request->search_student, function ($query) use ($request) {
                    return $query
                        ->where('first_name', 'like', '%' . $request->search_student . '%')
                        ->orwhere('second_name', 'like', '%' . $request->search_student . '%')
                        ->orwhere('last_name', 'like', '%' . $request->search_student . '%')
                        ->orwhere('phone', 'like', '%' . $request->search_student . '%')
                        ->orwhere('email', 'like', '%' . $request->search_student . '%');
                });
            })
            ->latest()
            ->paginate(5);

        return view('dashboard.users.index', compact('admins', 'teachers', 'students', 'users'));
    } //end of index

    public function create()
    {
        return view('dashboard.users.create_admin');
    } //end of create

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
            'image' => 'image'
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
        $activity = Activity::all()->last();
        $user->attachRole('admin');
        //$user->syncPermissions($request->permissions);
        return redirect()->route('dashboard.users.index');
    } //end of store

    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    } //end of show

    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    } //end of edit

    public function update(Request $request, User $user)
    {
        $rules = [];

        $rules = [
            'first_name' => 'required',
            'second_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_of_join' => 'required',
        ];

        /* if ($user->hasRole(['admin', 'teacher'])) {
            $rules += ['permissions' => 'required'];

            $request->validate($rules);
            $requests_data = $request->except(['permissions']);
            $user->syncPermissions($request->permissions);
        } else {
            $request->validate($rules);
            $requests_data = $request->except(['permissions']);
        }
 */

        $request->validate($rules);
        $requests_data = $request->except(['permissions']);

        $user->update($requests_data);
        $activity = Activity::all()->last();
        return redirect()->route('dashboard.users.index');
    } //end of update

    public function destroy(User $user)
    {
        $user->delete();
        $activity = Activity::all()->last();
        return redirect()->route('dashboard.users.index');
    } //end of destroy
} //end of controller
