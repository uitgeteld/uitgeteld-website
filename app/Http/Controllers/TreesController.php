<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Tree;

class TreesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        $user = User::all()
            ->first(fn($u) => Str::slug($u->name) === strtolower($username));

        abort_if(!$user, 404);

        $tree = $user->tree()->with('links')->where('activated', true)->first();

        abort_if(!$tree, 404);

        return view('tree.show', compact('user', 'tree'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();
        $tree = $user->tree()->with('links')->firstOrFail();

        return view('tree.edit', compact('tree'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $tree = $user->tree()->firstOrFail();

        $validated = $request->validate([
            'description' => 'nullable|string|max:255',
            'style'       => 'nullable|in:coding,simple',
            'theme'       => 'nullable|in:0,1,2',
        ]);

        /** @var Tree $tree */
        $tree->update($validated);

        return redirect()->route('tree.edit')->with('status', 'tree-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function activate()
    {
        /** @var User $user */
        $user = Auth::user();
        $tree = $user->tree;

        if ($tree) {
            $tree->update(['activated' => true]);
        } else {
            $tree = $user->tree()->create(['activated' => true]);
        }

        return redirect()->route('tree.edit')->with('status', 'tree-activated');
    }

    public function deactivate()
    {
        $tree = Auth::user()->tree;

        if ($tree) {
            $tree->update(['activated' => false]);
        }

        return redirect()->route('profile.show')->with('status', 'tree-deactivated');
    }
}
