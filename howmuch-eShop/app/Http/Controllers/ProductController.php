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

    public function getAllProductsForAdmin()
    {

        $products = Product::all();

        return view('pages-admin/products-admin', compact('products'));
    }

    public function createNewProductAdmin()
    {

        return view('pages-admin/create-product-admin');
    }

    public function storeNewProductAdmin(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'amount' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0.01',
            'image' => 'nullable|string|max:255'
        ]);

        Product::create($validated);

        return redirect('/admin/products')->with('success', 'Product has been successfully stored');
        
    }

    public function deleteProductById($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('success', 'Product has been successfully deleted');
    }
}
