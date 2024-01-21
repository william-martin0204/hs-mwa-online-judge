<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index()
    {
        $tokens = auth()->user()->tokens->map->only(['id', 'name', 'created_at']);

        return view('tokens.index', compact('tokens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $token = auth()->user()->createToken($request->name);

        session()->flash('success_token', $token->plainTextToken);
        return redirect()->route('tokens.index');
    }

    public function destroy($id)
    {
        auth()->user()->tokens()->where('id', $id)->delete();

        return redirect()->route('tokens.index');
    }
}
