<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->withUsers(User::all());
    }
}
