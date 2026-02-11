<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Repositories\ProductRepository;
use App\Services\CartService;

class ShoppingCartController extends Controller
{
    public function __construct(
            private readonly ProductRepository $productRepository,
            private readonly CartService $cartService){}

    public function addToCart(CartAddRequest $request)
    {
        $validated = $request->validated();
        $product = $this->productRepository->findById($validated['id']);
        
        if($validated['amount'] > $product->amount){
            return back()->with('message', 'Out of stock!');
        }

        $added = $this->cartService->add($product->id, $validated['amount']);

        if(! $added){
            return back()->with('message', 'Failed to be added to a cart!');
        }

        return redirect()
                ->route('products.permalink', $product)
                ->with('success', 'Product has been successfully added to a cart!');
                
    }

    public function removeItem(int $productId)
    {
        $deleted = $this->cartService->remove($productId);

        if(! $deleted){
            return back()->with('message', 'Product is not added to cart!');
        }
        return back()->with('success', 'Product is successfully deleted from a cart!');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return back()->with('success', 'Cart is empty!');
    }
}
