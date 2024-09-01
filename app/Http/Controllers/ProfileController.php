<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;
//use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use app\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        //TODO if user not admin :... else fetch all profiles
        // Only actives profiles are fetched
        if (!Auth::guard('admin')->check()) {
            $profiles = Profile::where('status', 'actif')
                                ->orderBy('updated_at', 'desc')
                                ->paginate(20, ['id', 'first_name', 'last_name', 'image', 'updated_at']); 
                                // Timestamps are not displayed here by choice (!== requested), since I assumed it is an info to protect

            $status_displayed = 'actifs';
        } else {
        // All profiles are fetched
            $profiles = Profile::orderBy('updated_at', 'desc')
                ->paginate(25, ['id', 'first_name', 'last_name', 'image', 'updated_at', 'status']);

            $status_displayed = 'complète';
        }

        if (!$profiles) {
            return redirect()->route('homepage')->with('error', 'Pas de profile à montrer actuellement');
        }

        return view('profiles.index', [
            'profiles' => $profiles,
            'status_displayed' => $status_displayed
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
