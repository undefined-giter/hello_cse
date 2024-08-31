<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;
//use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use app\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        //TODO if user not admin :... else fetch all profiles
        // Only actives profiles are fetched
        $profiles = Profile::where('status', 'actif')
                            ->orderBy('updated_at', 'desc')
                            ->paginate(20, ['id', 'first_name', 'last_name', 'image']); 
                            // Timestamps are not displayed here by choice (!== requested), since I assumed it is an info to protect

        // All profiles are fetched
        // $profiles = Profile::orderBy('updated_at', 'desc')
        //                     ->paginate(25, ['id', 'first_name', 'last_name', 'image', 'status']);


        if (!$profiles) {
            return redirect()->route('homepage')->with('error', 'Pas de profile à montrer actuellement');
        }

        return view('profiles.index', [
            'profiles' => $profiles
        ]);
    }

    public function details($id): RedirectResponse | View
    {
        $profile = Profile::find($id);

        if (!$profile) {
            return redirect()->route('profiles.index')->with('error', 'Le profile demandé n\'a pas été trouvé');
        }

        return view('profiles.profilCard', [
            'profile' => $profile
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
