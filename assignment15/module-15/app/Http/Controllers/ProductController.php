<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

// Task 5: Controller
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Return a view to display the products or return a JSON response
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return a view for creating a new product
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add more validation rules for other fields
        ]);

        // Create a new product using the validated data
        $product = Product::create($validatedData);

        // Redirect to the product's details page or return a JSON response
        return redirect()->route('products.show', $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Fetch the product with the given ID from the database
        $product = Product::findOrFail($id);

        // Return a view to display the product or return a JSON response
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Fetch the product with the given ID from the database
        $product = Product::findOrFail($id);

        // Return a view for editing the product
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add more validation rules for other fields
        ]);

        // Fetch the product with the given ID from the database
        $product = Product::findOrFail($id);

        // Update the product using the validated data
        $product->update($validatedData);

        // Redirect to the product's details page or return a JSON response
        return redirect()->route('products.show', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Fetch the product with the given ID from the database
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect to the product listing page or return a JSON response
        return redirect()->route('products.index');
    }
}
