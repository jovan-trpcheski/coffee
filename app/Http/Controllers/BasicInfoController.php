<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use App\Http\Requests\UpdateBasicInfoRequest;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class BasicInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $basicInfo = BasicInfo::first();

        return Inertia::render('BasicInfo', [
            'status' => session('status'),
            'basicInfo' => $basicInfo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBasicInfoRequest $request)
    {
        $basicInfo = BasicInfo::first();
        $basicInfo->name = $request->name;
        $basicInfo->description = $request->description;
        $basicInfo->phone = $request->phone;
        $basicInfo->address = $request->address;
        $basicInfo->email = $request->email;
        $basicInfo->meta_title = $request->meta_title;
        $basicInfo->meta_description = $request->meta_description;
        if ($request->hasFile('meta_picture')) {
            if ($basicInfo->meta_picture!=null)
            {
                Storage::delete('public/'.$basicInfo->meta_picture);
            }
            $basicInfo->meta_picture = $request->file('meta_picture')->store('photos', 'public');
        }
        $basicInfo->save();
        return to_route('info');
    }
}
