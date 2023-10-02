<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
            'price' => ['required'],

        ]);


        return Product::create(
            [
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'price' => $validated['price'],
                'user_id' => auth('sanctum')->id()
            ]


        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product  = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Product::destroy($id);
    }

    public function search($name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }
}
