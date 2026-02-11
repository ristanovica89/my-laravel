<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\CartService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(
            private readonly ProductRepository $productRepository,
            private readonly CartService $cartService){}

    public function index()
    {
        $products = $this->productRepository->getAll();
        
        return view('shop', compact('products'));
    }

    // Read
    public function getAllProductsForAdmin()
    {

        $products = $this->productRepository->getAll();

        return view('pages-admin/products-admin', compact('products'));
    }

    public function permalink(Product $product)
    {

        $cart = $this->cartService->getCart();

        // dostupna kolicina ili virtual stock
        $cartAmount = $this->cartService->getAmount($product->id);
        $available = $product->amount - $cartAmount;

        $totalPrice = $this->cartService->cartTotalPrice();
        $countItems = count($cart);

        return view('permalink', compact('product', 'cart','available','totalPrice', 'countItems'));
    }

    // Create
    public function storeNewProductAdmin(SaveProductRequest $request)
    {

        $this->productRepository->create($request->validated());

        return redirect()->route('products.getAllProductsForAdmin')->with('success', 'Product has been successfully stored');
        
    }

    // Delete
    public function deleteProductById(Product $product)
    {
        $success = $this->productRepository->delete($product);

        if(! $success){
            return back()->with('message', 'Failed to delete product!');
        }

        return back()->with('success', 'Product has been successfully deleted');
    }

    // Update

    public function getProductForUpdateById(Product $product)
    {
        return view('pages-admin/update-product-admin', compact('product'));
    }

    public function updateProductById(UpdateProductRequest $request, Product $product)
    {
        $this->productRepository->update($product,$request->validated());

        return redirect()->route('products.getAllProductsForAdmin')->with('success', 'Product has been successfully updated');
    }
}
