<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarUpdateRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(AvatarUpdateRequest $request){

        $path = $request->file('avatar')->store('avatars', 'public');
        auth()->user()->update(['avatar' => $path]);

        return back()->with("success","Avatar updated successfully");
    }
}
