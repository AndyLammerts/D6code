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

    public function addAdmin(User $user){
        $user = config('roles.models.defaultUser')::find($user->id);
        $user->attachRole($adminRole);
        return redirect('/privilege');
        }

    public function change(User $user){
    }
}
