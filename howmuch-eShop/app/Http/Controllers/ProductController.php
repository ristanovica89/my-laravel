<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        
        return view('shop', compact('products'));
    }

    // Read
    public function getAllProductsForAdmin()
    {

        $products = Product::all();

        return view('pages-admin/products-admin', compact('products'));
    }

    // Create
    public function storeNewProductAdmin(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|unique:products|min:3',
            'description' => 'required|string|min:5',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'image' => 'nullable|string|max:255'
        ]);

        Product::create($validated);

        return redirect()->route('products.getAllProductsForAdmin')->with('success', 'Product has been successfully stored');
        
    }

    // Delete
    public function deleteProductById(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product has been successfully deleted');
    }

    // Update

    public function getProductForUpdateById(Product $product)
    {
        return view('pages-admin/update-product-admin', compact('product'));
    }

    public function updateProductById(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|unique:products,name,'. $product->id,
            'description' => 'required|string|min:5',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'image' => 'nullable|string|max:255'
        ]);

        $product->update($validated);

        return redirect()->route('products.getAllProductsForAdmin')->with('success', 'Product has been successfully updated');
    }
}
