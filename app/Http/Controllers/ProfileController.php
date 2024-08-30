<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use app\Models\Profile;
use app\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function store(ProfileRequest $request)
    {
        $profile = Profile::create($request->validated());
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profiles', 'public');
        }else{
            $path = 'profiles/default_user_img.png';
        }
        $profile->update(['image' => $path]);

        return to_route('homepage')->with('success', 'L\'utilisateur a bien été ajouté');
    }
}
