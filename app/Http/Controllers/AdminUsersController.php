<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUsersController
{

    /**
     * Show all users
     * @return View
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show create form
     * @return View
     */
    public function create() {
        return view('admin.users.create');
    }

    /**
     * Store a new user
     * @param Request $request
     * @return redirect
     */
    public function store(Request $request) {

        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create();
        $user->fill($request->except('password'));
        $user->password = Hash::make($request->password);
        $user->save();
        
        Session::flash('message', 'Successfully added user'); 
        Session::flash('name', $user->email); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.users.show', $user));
    }

    /**
     * Show user
     * @param User $user
     * @return View
     */
    public function show(User $user) {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show edit user form
     * @param User $user
     * @return View
     */
    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update user
     * @param request $request
     * @param User $user
     * @return View
     */
    public function update(request $request, User $user) {
        // If the email has changed

        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);


        $user->fill($request->except('password'));

        // Change password if something is inputted
        if($request->password != '') {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        Session::flash('message', 'Successfully updated user'); 
        Session::flash('name', $user->firstname . " " . $user->surname); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.users.show', $user));
    }

    /**
     * Show confirm delete post
     * @param User $user
     * @return View
     */
    public function confirmdelete(User $user) {
        return view('admin.users.confirmdelete', compact('user'));
    }
    
    /**
     * Delete user
     * @param User $user
     * @return View
     */
    public function delete(User $user) {
        $user->delete();

        Session::flash('message', 'Successfully deleted user'); 
        Session::flash('name', $user->name); 
        Session::flash('alert-class', 'alert-success');

        return redirect(route('admin.users.index'));
    }
}