<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use App\Http\Requests\StoreSocialLinkRequest;
use App\Http\Requests\UpdateSocialLinkRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = SocialLink::all();

        return Inertia::render('SocialLinks/Index', [
            'status' => session('status'),
            'socialLinks' => $socialLinks
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('SocialLinks/Create', [
            'status' => session('status'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocialLinkRequest $request)
    {
        $socialLink = new SocialLink();
        $socialLink->name = $request->name;
        $socialLink->link = $request->link;
        if ($request->hasFile('svg')) {
            if ($socialLink->svg!=null)
            {
                Storage::delete('public/'.$socialLink->svg);
            }
            $socialLink->svg = $request->file('svg')->store('photos/social', 'public');
        }
        $socialLink->save();
        return to_route('social-links.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialLink $socialLink)
    {
        return Inertia::render('SocialLinks/Edit', [
            'status' => session('status'),
            'socialLink' => $socialLink
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialLinkRequest $request, SocialLink $socialLink)
    {
        $socialLink->name = $request->name;
        $socialLink->link = $request->link;
        if ($request->hasFile('svg')) {
            if ($socialLink->svg!=null)
            {
                Storage::delete('public/'.$socialLink->svg);
            }
            $socialLink->svg = $request->file('svg')->store('photos/social', 'public');
        }
        $socialLink->save();
        return to_route('social-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialLink $socialLink)
    {
        if ($socialLink->svg)
        {
            Storage::delete('public/'.$socialLink->svg);
        }
        $socialLink->delete();
        return Redirect::back()->with('status', 'Organization deleted.');
    }
}
