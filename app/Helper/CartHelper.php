<?php

namespace App\Helper;

class CartHelper
{
  public $items = [];
  public $total_quantity = 0;
  public $total_price = 0;

  public function  __construct()
  {
    $this->items = session('cart') ? session('cart') : [];
    $this->total_quantity = $this->tongsoluong();
    $this->total_price = $this->tongtien();
  }
  public function add($product, $quantity = 1)
  {
    $item = [
      'id' => $product->id,
      'tensanpham' => $product->tensanpham,
      'hinhanh' => $product->hinhanh,
      'gia' => $product->gia,
      'mau' => $product->mau,
      'size' => $product->size,
      'quantity' => $quantity,
    ];
    if (isset($this->items[$product->id])) {
      $this->items[$product->id]['quantity'] += $quantity;
    } else {
      $this->items[$product->id] = $item;
    }
    session(['cart' => $this->items]);
  }
  private function tongtien()
  {
    $t = 0;
    foreach ($this->items as $item) {
      $t +=  ($item['gia'] * $item['quantity']);
    }
    return $t;
  }
  private function tongsoluong()
  {
    $t = count($this->items);
    // foreach ($this->items as $item) {
    //   $t = $t + $item['quantity'];
    // }
    return $t;
  }
  public function remove($id)
  {
    if (isset($this->items[$id])) {
      unset($this->items[$id]);
    }
    session(['cart' => $this->items]);
  }
  public function update($id, $quantity)
  {
    if (isset($this->items[$id])) {
      $this->items[$id]['quantity'] = $quantity;
    }
    session(['cart' => $this->items]);
  }
  public function clear()
  {
    session(['cart' => []]);
  }
}
