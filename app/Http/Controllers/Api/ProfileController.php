<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

    public function update(ProfileUpdateRequest $request, User $user)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        if ($request->hasFile('photo')) {
            $request->user()->clearMediaCollection();
            $request->user()->addMediaFromRequest('photo')->toMediaCollection();

            Cache::delete('avatar--'.$request->user()->id);
            Cache::delete('avatar-preview-'.$request->user()->id);
        }

        return new UserResource($request->user());
    }

    public function destroy(Request $request)
    {
        $request->user()->delete();

        return response("User deleted successfully");
    }
}
