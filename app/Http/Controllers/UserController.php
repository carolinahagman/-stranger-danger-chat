<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Controllers\Session;

class UserController extends Controller
{
    public function edit()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user) {
                return view('user.edit')->with('user', Auth::user());
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {
            $validate = null;
            if (Auth::user()->email === $request['email']) {
                $validate = $request->validate([
                    'email' => 'required|email'
                ]);
            } else {
                $validate = $request->validate([
                    'email' => 'required|email|unique:users'
                ]);
            }
            if (Auth::user()->username === $request['username']) {
                $validate = $request->validate([
                    'username' => 'required|min:3',
                ]);
            } else {
                $validate = $request->validate([
                    'username' => 'required|min:3|unique:users',
                ]);
            }

            if ($validate) {
                $user->username = $request['username'];
                $user->email = $request['email'];

                $user->save();
                return redirect()->route('user.update')->with('success', 'Your profile has been updated.');
            } else {
                return back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function passwordEdit()
    {
        if (Auth::user()) {
            return view('user.password');
        } else {
            return redirect()->back();
        }
    }

    public function passwordUpdate(Request $request)
    {
        $validate = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
        ]);

        $user = User::find(Auth::user()->id);

        if ($user) {
            if (Hash::check($request['currentPassword'], $user->password) && $validate) {
                $user->password = Hash::make($request['password']);
                $user->save();
                return redirect()->route('password.update')->with('success', 'Your password has been updated.');
            } else {
                return back()->with('error', 'The entered password does not match your current password.');
            }
        }
    }

    public function delete(Request $request, $id)
    {
        if ($request->has('username')) {
            $user = Auth::user();
            $username = $user->username;

            $request->validate([
                'username' => 'required',
            ]);

            if ($username === $request->username) {
                $user = User::findOrFail($id);
                $user->delete();
                session_unset();

                return redirect()->route('login')->with('status', 'Your account has successfully been deleted.');
            }

            return back()->with('error', 'Username entered does not match, please try again.');
        }
    }

    public function profile($id)
    {
        $user = User::find($id);

        if ($user) {
            return view('user.profile')->with('user', Auth::user());
        } else {
            return redirect()->back();
        }
    }
}
