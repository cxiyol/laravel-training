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
        dd($request->all());
        
        // store the avatar image
        return back()->with('message', 'Avatar updated successfully');
    }   
}
