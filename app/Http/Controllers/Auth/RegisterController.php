<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Address;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['required', 'string', 'min:10', 'max:11'],
            'street' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = config('roles.models.defaultUser')::create([
            'username' => $data['username'],
            'first_name' =>$data['first_name'],
            'last_name' =>$data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number'=>$data['phone_number'],
        ]);
         Address::create([
            'user_id' => $user->id,
            'street' => $data['street'],
            'postal_code' => $data['postal_code'],
            'house_number' =>$data['house_number'],
            'city' =>$data['city'],
        ]);
        $role = config('roles.models.role')::where('name', '=', 'User')->first();  //choose the default role upon user creation.
        $user->attachRole($role);
        return $user;
    }
}
