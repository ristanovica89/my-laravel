<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Repositories\ProductRepository;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function __construct(
        private readonly ProductRepository $productRepository,
        private readonly CartService $cartService
    ) {}

    public function showCart()
    {
        $cart = $this->cartService->getCart();
        $totalPrice = $this->cartService->cartTotalPrice();

        return view('cart', compact('cart', 'totalPrice'));
    }

    public function addToCart(CartAddRequest $request)
    {
        $validated = $request->validated();
        $product = $this->productRepository->findById($validated['id']);

        if ($validated['amount'] > $product->amount) {
            return back()->with('message', 'Out of stock!');
        }

        $added = $this->cartService->add($product->id, $validated['amount']);

        if (! $added) {
            return back()->with('message', 'Failed to be added to a cart!');
        }

        return redirect()
            ->route('products.permalink', $product)
            ->with('success', 'Product has been successfully added to a cart!');
    }

    public function removeItem(int $productId)
    {
        $deleted = $this->cartService->remove($productId);

        if (! $deleted) {
            return back()->with('message', 'Product is not added to cart!');
        }
        return back()->with('success', 'Product is successfully deleted from a cart!');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return back()->with('success', 'Cart is empty!');
    }

    public function checkout(Request $request)
    {

        $cart = $this->cartService->getCart();

        if (count($cart) < 1) {
            return back()
                ->with('message', 'Your cart is empty')
                ->withInput();
        }

        $outOfStock = $this->cartService->checkStock();

        if (!empty($outOfStock)) {
            return back()
                ->with('message', 'Products out of stock: ' . implode(', ', $outOfStock))
                ->withInput();
        }

        $user = Auth::user();

        $rules = [
            'total_price' => ''
        ];
    }

    private function checkAvailableAmount($cart,) {}
}
