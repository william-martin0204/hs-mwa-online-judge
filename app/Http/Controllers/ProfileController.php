<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // Get a sorted list of users ordered by the amount of accepted submissions on distinct problems
        $sorted_users = User::query()
            ->leaderboard()
            ->when($request->query('search'), function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        foreach ($sorted_users as $key => $user) {
            $user->rank = $key + 1 + ($sorted_users->currentPage() - 1) * 20;
        }

        return view('profile.index', [
            'sorted_users' => $sorted_users,
        ]);
    }

    public function show(User $user)
    {
        $sorted_users = User::query()
            ->leaderboard()
            ->get();

        $rank = $sorted_users->search(function ($item) use ($user) {
            return $item->id === $user->id;
        }) + 1;

        return view('profile.show', compact('user', 'rank'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
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

        session()->flash('success_notification', 'User profile successfully updated');

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
