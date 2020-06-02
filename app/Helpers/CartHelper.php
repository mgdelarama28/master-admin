<?php

namespace App\Helpers;

use App\Models\Cart;

class CartHelper
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function getCart()
    {
        if (auth()->guard('web')->check()):
            // return user cart
        else:
            return $this->cart->getOrCreateSessionCart();
        endif;
    }
}
