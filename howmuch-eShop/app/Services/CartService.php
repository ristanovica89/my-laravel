<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Session;

class CartService
{

  protected $sessionKey = 'cart';
  public function __construct(private readonly ProductRepository $productRepository) {}

  public function getCart(): array
  {
    return Session::get($this->sessionKey, []);
  }

  public function getAmount(int $productId): int
  {
    $cart = $this->getCart();
    return $cart[$productId]['amount'] ?? 0;
  }

  public function checkStock($products): array
  {
    $cart = $this->getCart();

    return collect($cart)
      ->filter(
        fn($item, $productId) =>
        !isset($products[$productId]) || $products[$productId]->amount < $item['amount']
      )
      ->keys()
      ->map(fn($id) => $products[$id]->name ?? 'Unknown product')
      ->toArray();
  }

  public function cartTotalPrice()
  {
    $cart = $this->getCart();
    return array_sum(array_map(fn($item) => $item['price'] * $item['amount'], $cart));
  }

  public function totalPrice($products): float
  {
    $cart = $this->getCart();
    if (empty($cart)) {
      return 0;
    }

    $total = 0;
    foreach ($products as $product) {
      if (! isset($cart[$product->id])) {
        continue;
      }

      $total += $product->price * $cart[$product->id]['amount'];
    }
    return $total;
  }

  public function add(int $productId, int $amount): bool
  {
    // *** Za kasnije ***
    // optimizacija:
    // $productIds = array_keys($cart);
    // $products = Product::whereIn('id', $productIds)->get();
    // cuvati u sessiji samo productId i quantity(amount) !!!

    $cart = $this->getCart();
    $product = $this->productRepository->findById($productId);

    if (isset($cart[$productId])) {
      $cart[$productId]['amount'] += $amount;
    } else {
      $cart[$productId] = [
        'name' => $product->name,
        'amount' => $amount,
        'price' => $product->price,
        'image' => $product->image,
      ];
    }
    Session::put($this->sessionKey, $cart);
    return true;
  }

  public function remove(int $productId): bool
  {
    $cart = $this->getCart();

    if (! isset($cart[$productId])) {
      return false;
    }

    unset($cart[$productId]);
    Session::put($this->sessionKey, $cart);
    return true;
  }

  public function checkout(array $cart, array $data, $user = null)
  {
    $productIds = array_keys($cart);
    $products = $this->productRepository->findManyByIds($productIds);

    $outOfStock = $this->checkStock($products, $cart);
    if (!empty($outOfStock)) {
      throw new \Exception('Products out of stock: ' . implode(', ', $outOfStock));
    }

    $totalPrice = $this->totalPrice($products, $cart);

    $order = Order::create([
      'phone_number' => $data['phone_number'],
      'address' => $data['address'],
      'total_price' => $totalPrice,
      'user_id' => $user ? $user->id : null,
      'guest_name' => $user ? null : $data['guest_name'],
      'guest_email' => $user ? null : $data['guest_email'],
    ]);

    foreach ($cart as $productId => $item) {
      $product = $products[$productId];

      OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $productId,
        'amount' => $item['amount'],
        'price' => $item['amount'] * $product->price,
      ]);

      $product->amount -= $item['amount'];
      $product->save();
    }

    return $order;
  }
}
