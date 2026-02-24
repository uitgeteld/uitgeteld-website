<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\User;
use App\Models\Tree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinksController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $tree = $user->tree()->firstOrFail();

        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'url'     => 'required|url|max:255',
            'color'   => 'nullable|string|max:7',
        ]);

        /** @var Tree $tree */
        $tree->links()->create($validated);

        return redirect()->route('tree.edit')->with('status', 'link-added');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $link)
    {
        /** @var User $user */
        $user = Auth::user();
        $link = Link::whereHas('tree', fn($q) => $q->where('user_id', $user->id))
            ->findOrFail($link);

        $validated = $request->validate([
            'content' => 'required|string|max:255',
            'url'     => 'required|url|max:255',
            'color'   => 'nullable|string|max:7',
        ]);

        $link->update($validated);

        return redirect()->route('tree.edit')->with('status', 'link-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $link)
    {
        /** @var User $user */
        $user = Auth::user();
        $link = Link::whereHas('tree', fn($q) => $q->where('user_id', $user->id))
            ->findOrFail($link);

        $link->delete();

        return redirect()->route('tree.edit')->with('status', 'link-deleted');
    }

    public function reorder(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $tree = $user->tree()->firstOrFail();

        $validated = $request->validate([
            'order'   => 'required|array',
            'order.*' => 'integer',
        ]);

        foreach ($validated['order'] as $position => $id) {
            /** @var Tree $tree */
            $tree->links()->where('id', $id)->update(['position' => $position]);
        }

        return response()->json(['ok' => true]);
    }
}
