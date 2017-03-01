<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return redirect()->action('UserController@show', Auth::user());
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => Auth::user()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
        
        Auth::user()->update($request->all());
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('storage/images');
            Auth::user()->update([
                'image' => $path
            ]);
        }

        return redirect()->action('ProfileController@show');
    }
}
