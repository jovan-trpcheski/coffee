<?php

namespace App\Http\Controllers;

use App\Models\BasicInfo;
use App\Models\Category;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontPageController extends Controller
{
    public function show()
    {
        $socialLinks = SocialLink::where('link','<>',null)->where('link','<>',null)->get();
        $categories = Category::with('products')->withCount('products')->having('products_count', '>', 0)->get();
        $basicInfo = BasicInfo::firstOrFail();
        return Inertia::render('FrontPage/Show', [
            'status' => session('status'),
            'categories' => $categories,
            'basicInfo' => $basicInfo,
            'socialLinks'=> $socialLinks
        ]);
    }
}
