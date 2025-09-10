<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        // Get the profile of the logged-in user OR create empty instance
        $profile = Profile::firstOrCreate(
            ['user_id' => $user->id],
            ['email' => $user->email] // default email gikan sa users table
        );

        return view('profile', compact('profile'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $profile = Profile::firstOrNew(['user_id' => $user->id]);

        $profile->first_name     = $request->first_name;
        $profile->middle_name    = $request->middle_name;
        $profile->last_name      = $request->last_name;
        $profile->sex            = $request->sex;
        $profile->nationality    = $request->nationality;
        $profile->id_number      = $request->id_number;
        $profile->contact_number = $request->contact_number;
        $profile->address        = $request->address;
        $profile->religion       = $request->religion;
        $profile->civil_status   = $request->civil_status;
        $profile->email          = $request->email;
        $profile->birthday       = $request->birthday;
        $profile->course         = $request->course;
        $profile->year           = $request->year;
        $profile->department     = $request->department;

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $profile->profile_picture = $path;
        }

        $profile->user_id = $user->id;
        $profile->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
