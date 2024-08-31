<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Profile;
use app\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        //TODO if user not admin :... else fetch all profiles
        $activesProfiles = Profile::where('status', 'actif')
                            ->orderBy('updated_at', 'desc')
                            ->get(['id', 'first_name', 'last_name', 'image']);

        return view('profiles.index', [
            'profiles' => $activesProfiles
        ]);
    }

    public function create()
    {
        return view('profiles.create');
    }

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
