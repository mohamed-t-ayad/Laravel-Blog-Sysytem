<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\profile;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        if($user->profile == null) {
            $profile = profile::create([
                'city' => 'Tala',
                'bio' => 'hello',
                'gender' => 'Male',
                'facebook' => 'url',
                'user_id' => $id
            ]);
        }
        return view('users.profile')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function update(Request $request)
    {
        //$offer = offer::find($offer_id);


        $this->validate($request,[
            'name' => 'required',
            'city' => 'required',
            'bio' => 'required',
            'gender' => 'required',
        ]);
        $user =Auth::user();

        $user->name = $request->name;
        $user->profile->city = $request->city;
        $user->profile->facebook = $request->facebook;
        $user->profile->bio = $request->bio;
        $user->profile->gender = $request->gender;

        $user->save();
        $user->profile->save();
        //$user->update($request->all());

        if($request->has('password')) {
            $user->password = bcrypt($request->password);
            $user->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
