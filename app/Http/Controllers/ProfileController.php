<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function edit()
    {
        return view('blueprint.edit');
    }
    public function getEditData()
    {
        $profileData = DB::table('users')->where('email', '=', session()->get('user_email'))->first();

        return response()->json(['editData' => $profileData]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|digits:10',
            'address' => 'required',
            'profile' => 'mimes:png,jpg,jpeg,avif'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'validation', 'error' => $validator->messages()]);
        }
        if ($request->has('profile')) {
            $filePath = "images/Profiles/$request->profile";
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $fileOriginalName = $request->file('profile')->getClientOriginalName();
            $updateProfile = DB::table('users')->where('email', $request->email)->update([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'address' => $request->address,
                'profile' => $fileOriginalName,
            ]);

            if ($updateProfile) {
                $request->profile->move('images/Profiles/', $fileOriginalName);
                return response()->json(['status' => 'success', 'message' => 'profile updated successfully']);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Error in updating the profile']);
            }
        } else {
            $updateProfile = DB::table('users')->where('email', $request->email)->update([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'address' => $request->address,
            ]);

            return $updateProfile ? response()->json(['status' => 'success', 'message' => 'Profile updated successfully']) : response()->json(['status' => 'failed', 'message' => 'error in updating the profile']);
        }
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_pass' => 'required',
            'new_pass' => 'required|confirmed',
            'new_pass_confirmation' => 'required'

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'validation', 'error' => $validator->messages()]);
        }

        $ifOldPasswordMatched = DB::table('users')->where('email', session()->get('user_email'))->where('password', $request->old_pass)->first();
        if ($ifOldPasswordMatched) {

            $update = DB::table('users')->where('email', session()->get('user_email'))->update(['password' => $request->new_pass]);
            return $update ? response(['status' => 'success', 'message' => 'Password Updated successfully']) : response()->json(['status' => 'failed', 'message' => 'Error in updating the password']);
        } else {
            return response()->json(['message' => 'password not matched']);
        }
    }
}
