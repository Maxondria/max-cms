<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateProfileRequest;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->withUsers(User::all());
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();

        session()->flash('success', "USER PROMOTED SUCCESSFULLY");

        return redirect(route('users.index'));
    }

    public function edit()
    {
        return view('users.edit')->withUser(auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about,
        ]);

        session()->flash('success', "USER UPDATED SUCCESSFULLY");

        return redirect()->back();
    }
}
