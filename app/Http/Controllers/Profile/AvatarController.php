<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    // -------------------------------------------------------------------
    // 
    // now it is using the UpdateAvatarRequest class to validate the request
    // it is from the app\Http\Requests\UpdateAvatarRequest.php file
    // 
    // -------------------------------------------------------------------
    {        
        $path = $request->file('avatar')->store('avatars');
        auth()->user()->update(['avatar' => storage_path('app')."/$path"]);
        // -------------------------------------------------------------------
        // 
        // this is a way to store and get the path of the avatar image
        // 
        // -------------------------------------------------------------------
        
        // store the avatar image
        return redirect(route('profile.edit'))->with('message', 'Avatar updated successfully');
    }   
}
