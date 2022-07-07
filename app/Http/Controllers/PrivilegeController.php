<?php

namespace App\Http\Controllers;

Use App\Models\User;
use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    protected $user;

    public function index() {
        $users = User::all();
        return view('privilege.index', compact('users'));
    }

    public function edit(User $user){
        return view('privilege.edit', compact('user'));
    }

    public function change(User $user){
    }
}
