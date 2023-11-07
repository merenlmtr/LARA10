<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\AvatarUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(AvatarUpdateRequest $request){

        $path = $request->file('avatar')->store('avatars', 'public');
        if($old_avatar = $request->user()->avatar){
            Storage::disk('public')->delete($old_avatar);
        }
        auth()->user()->update(['avatar' => $path]);

        return back()->with("success","Avatar updated successfully");
    }
}
