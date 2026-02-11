<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function __construct(private readonly ProductRepository $productRepository){}

    public function addToCart(CartAddRequest $request)
    {
        $validated = $request->validated();
        $product = $this->productRepository->findById($validated['id']);
        
        if($validated['amount'] > $product->amount){
            return back()->with('message', 'Out of stock!');
        }

        $cart = session()->get('cart',[]);
        
        $productId = $product->id;
        
        if( isset($cart[$productId])){
            $cart[$productId]['amount']+=$validated['amount'];
        }else{
            $cart[$productId] = [
                'name' => $product->name,
                'amount'=>$validated['amount'],
                'price'=>$product->price,
                'image'=>$product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
                ->route('products.permalink', $product)
                ->with('success', 'Product has been successfully added to a cart!');
        
        
    }

    public function clearCart()
    {
        session()->forget('cart');
        return back()->with('success', 'Cart is empty!');
    }
}
