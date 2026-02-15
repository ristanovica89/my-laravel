<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\Order;
use App\Models\OrderItem;
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

        if (empty($cart)) {
            return back()->with('message', 'Your cart is empty')->withInput();
        }

        $user = Auth::user();

        $checkoutData = $request->only([
            'phone_number',
            'address',
            'guest_name',
            'guest_email'
        ]);

        try {
            $this->cartService->checkout($cart, $checkoutData, $user);
        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->withInput();
        }

        session()->forget('cart');

        return view('thank-you')->with('success', 'Your order has been successfully placed!');
    }
}
