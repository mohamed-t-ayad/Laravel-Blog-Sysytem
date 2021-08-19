<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
// for function Hash()
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('users.index')->with('users' , $users);
    }


    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->name,
            'password' => hash::make($request->password),
        ]);
        $profile = Profile::create([
            'city' => 'Kirkuk',
            'user_id'	 =>$user->id,
            'gender' => 'Male',
            'bio'	 => 'Hello world',
            'facebook' => 'https://www.facebook.com',
           ]);

        return redirect()->route('users');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete($id);
        $user->delete();
        return redirect()->route('users');
    }
}
