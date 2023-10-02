<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function generateRandomToken()
    {
        $token = Str::random(60);
        return $token;
    }
    //
    public function register()
    {
        return view('register');
    }
    public function registerValidate(Request $request)
    {
        $rules = [
            'name' => 'required|min:4|max:40',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|digits:10|numeric',
            'password' => 'required|min:8|max:16|confirmed',
            'password_confirmation' => 'required',
            'address' => 'required',
            'profile' => 'mimes:jpg,jpeg,png,avif,webp',
        ];

        $customMessages = [
            'name.required' => 'Name cannot be empty',
            'name.min' => 'Name must have a minimum of 4 characters',
            'name.max' => 'Name must be less than 40 characters',
            'email.required' => 'Email cannot be empty',
            'email.email' => 'Email must be a valid email address',
            'mobile.required' => 'Mobile cannot be empty',
            'email.unique' => 'The Email is already registered',
            'mobile.digits' => 'Mobile must be exactly 10 digits',
            'password.required' => 'Password cannot be empty',
            'password.min' => 'Password must have a minimum of 8 characters',
            'password.max' => 'Password must be less than 16 characters',
            'password_confirmation.required' => 'Confirm Password cannot be empty',
            'password.confirmed' => 'Password not matched',
            'address.required' => 'Address cannot be empty',
            'profile.mimes' => 'You can only upload jpg, jpeg, png, avif, or webp files',
        ];
        $token = $this->generateRandomToken();
        session()->put('token', $token);
        $validator = Validator::make($request->all(), $rules, $customMessages);
        $mailData = [
            'title' => 'Registration Successfull',
            'body' => "Hello $request->name Your Account is Created Successfully",
            'token' => $token,
            'email' => $request->email,
        ];

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->has('profile')) {
            $profileName = $request->file('profile')->getClientOriginalName();
            $RegisteredData = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => $request->password,
                'address' => $request->address,
                'profile' => $profileName,
                'status' => 'Inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            if ($RegisteredData) {
                $request->profile->move('Images/Profiles', $profileName);

                Mail::to($request->email)->send(new RegistrationMail($mailData));
                return redirect()->route('guest.login');
            }
        } else {
            $RegisteredData = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'password' => $request->password,
                'address' => $request->address,
                'profile' => 'default.jpg',
                'status' => 'Inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            if ($RegisteredData) {
                Mail::to($request->email)->send(new RegistrationMail($mailData));
                return redirect()->route('guest.login');
            }
        }

        return redirect()->route('guest.register');
    }
    public function activateAccount($email, $token)
    {
        $ifUserExists = DB::table('users')->where('email', $email)->where('status', 'Inactive')->count();
        if ($ifUserExists == 1) {
            $isTokenValid = session()->get('token');
            if ($token == $isTokenValid) {
                $update = DB::table('users')->where('email', $email)->update(['status' => 'Active']);
                $update ? session()->flash('Success', 'Account Activated Successfully') : session()->flash('Error', 'Error in Account Activation');
                return redirect()->route('guest.login');
            } else {
                session()->flash('Error', 'Invalid Token');
            }
        } else {
            session()->flash('Error', "email $email does not exists or The Account is already activated");
        }
        return redirect()->route('guest.login');
    }
}
