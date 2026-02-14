<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
  
  public function __construct(private readonly Product $product){}

  public function getAll()
  {
    return $this->product->all();
  }

  public function getLatest(int $quantity)
  {
    return $this->product->latest()->take($quantity)->get();
  }

  public function findById(int $id): Product
  {
    return $this->product->where('id', $id)->first();
  }

  public function create(array $data)
  {
    return $this->product->create($data);
  }

  public function update(Product $product, array $data): Product
  {
    $product->update($data);
    return $product->fresh();
  }

  public function delete(Product $product): bool
  {
    return (bool)$product->delete();
  }

  public function findManyByIds(array $ids)
    {
        return $this->product->whereIn('id', $ids)->get()->keyBy('id');
    }

}