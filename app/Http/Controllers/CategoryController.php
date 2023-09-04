<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{

    public function index(): Response
    {
        $categories = Category::all();
        return Inertia::render('Categories/Index', [
            'status' => session('status'),
            'categories' => $categories
        ]);
    }


    public function create(): Response
    {
        return Inertia::render('Categories/Create', [
            'status' => session('status'),
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
//        if ($request->hasFile('photo')) {
//            $category->photo = $request->file('photo')->store('photos/categories', 'public');
//        }
        $category->save();
        return to_route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return Inertia::render('Categories/Edit', [
            'status' => session('status'),
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
//        if ($request->hasFile('photo')) {
//            if ($category->photo!=null)
//            {
//                Storage::delete('public/'.$category->photo);
//            }
//            $category->photo = $request->file('photo')->store('photos/categories', 'public');
//        }
        $category->save();
        return to_route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
//        if ($category->photo) {
//            Storage::delete('public/'.$category->photo);
//        }
        $category->delete();
        return redirect()->back();
    }
}
