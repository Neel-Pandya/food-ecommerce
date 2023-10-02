<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function create()
    {
        return view('login');
    }
    public function loginStore(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email Cannot be empty',
                'password.required' => 'Password Cannot be empty',
            ],
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ifAccountIsActivated = DB::table('users')
            ->where('email', $request->email)
            ->where('password', $request->password)
            ->first();
        if ($ifAccountIsActivated) {
            if ($ifAccountIsActivated->status == 'Active') {
                session()->put('user_email', $request->email);
                session()->put('user_password', $request->password);
                return redirect()->route('user.index');
            } else {
                return redirect()
                    ->back()
                    ->with('loginError', 'Account is not activated please activate the account first');
            }
        } else {
            return redirect()->back()->with('Error', 'Invalid Credentials');
        }
    }
    public function logout()
    {
        session()->forget('user_email');
        session()->forget('user_password');
        return redirect()->route('guest.login');
    }
}
