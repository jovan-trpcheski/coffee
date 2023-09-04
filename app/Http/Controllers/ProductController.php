<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();

        return Inertia::render('Products/Index', [
            'status' => session('status'),
            'products' => $products
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return Inertia::render('Products/Create', [
            'status' => session('status'),
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if ($request->hasFile('photo')) {
            if ($product->photo!=null)
            {
                Storage::delete('public/'.$product->photo);
            }
            $product->photo = $request->file('photo')->store('photos/products', 'public');
        }
        $product->price = $request->price;
        $product->save();
        return to_route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return Inertia::render('Products/Edit', [
            'status' => session('status'),
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if ($request->hasFile('photo')) {
            $product->photo = $request->file('photo')->store('photos/products', 'public');
        }
        $product->price = $request->price;
        $product->save();
        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->photo)
        {
            Storage::delete('public/'.$product->photo);
        }
        $product->delete();

        return redirect()->back();

    }
}
