<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $defaultProfilPicture = 'default_user_img.png';

    public function index()
    {
        // Only actives profiles are fetched
        if (!Auth::guard('admin')->check()) {
            $profiles = Profile::where('status', 'actif')
                                ->orderBy('updated_at', 'desc')
                                ->paginate(20, ['id', 'first_name', 'last_name', 'image', 'updated_at']); 

            $status_displayed = 'actifs';
        } else {
        // All profiles are fetched
            $profiles = Profile::orderBy('updated_at', 'desc')
                ->paginate(25, ['id', 'first_name', 'last_name', 'image', 'updated_at', 'status']);

            $status_displayed = 'complète';
        }

        if (!$profiles) {
            return redirect()->route('homepage')->with('error', 'Pas de profil à montrer actuellement');
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
            return redirect()->route('profiles.index')->with('error', 'Le profil demandé n\'a pas été trouvé');
        }

        return view('profiles.profileCard', [
            'profile' => $profile
        ]);
    }

    public function create()
    {
        return view('profiles.createOrUpdate');
    }

    public function store(ProfileRequest $request)
    {
        $profile = Profile::create($request->validated());

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profiles', 'public');
            $profile->image = $path;
        }else{
            $path = 'profiles/' . $this->defaultProfilPicture;
        }
        $profile->update(['image' => $path]);

        return redirect()->route('profiles.list')->with('success', 'L\'utilisateur a bien été ajouté');
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);

        return view('profiles.createOrUpdate', [
            'profile' => $profile,
            'update' => true,
        ]);
    }

    public function update(ProfileRequest $request, $id)
    {
        $profile = Profile::findOrFail($id);
    
        $profile->update($request->validated());
    
        if ($request->hasFile('image') || $request->has('remove_img')) {
            if ($profile->image && $profile->image != 'profiles/' . $this->defaultProfilPicture) {
                Storage::disk('public')->delete($profile->image);
            }
    
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('profiles', 'public');
                $profile->update(['image' => $path]);
            } elseif ($request->has('remove_img')) {
                $profile->update(['image' => 'profiles/' . $this->defaultProfilPicture]);
            }
        }
    
        return redirect()->route('profiles.list')->with('success', 'Le profil a été mis à jour');
    }
    
}
