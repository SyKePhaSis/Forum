<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\User;

class ProfilesController extends Controller
{

    public function show(User $user)
    {
        return view("profiles.show", compact('user'));

    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view("profiles.edit", compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'url' => 'url|nullable',
            'description' => '',
            'business_email' => 'email|nullable',
            'image' => 'image'
        ]);

        $user->profile->deleteImage();

        if (request('image')) {
            $imagePath = request('image')->store('profile_pics', 'public');
        }

        if(!request('image') && $user->profile->image == NULL){
            $imagePath = "profile_pics/default_profile.png";
        }

        $user->profile->update([
            'url' => $data['url'],
            'description' => $data['description'],
            'business_email' => $data['business_email'],
            'image' => $imagePath,
        ]);

        return redirect("/profile/" . $user->id );

    }
}
