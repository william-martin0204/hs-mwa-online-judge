<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return UserResource::collection(
            User::query()
                ->with('media')
                ->paginate(10)
        );
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }
}
