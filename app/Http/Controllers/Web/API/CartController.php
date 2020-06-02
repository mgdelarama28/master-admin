<?php

namespace App\Http\Controllers\Web\API;

use App\Models\Cart;
use App\Models\CartItem;
use App\Helpers\CartHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cart;

    public function __construct(CartHelper $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $cart = $this->cart->getCart();

        $subtotal = 0;

        // foreach($cart->cartItems as $cartItem):
        //     $subtotal += $cartItem->total;
        // endforeach;

        $cart->subtotal = $cart->getSubtotal();
        $cart->save();

        return response()->json([
            'cart' => $cart,
        ]);
    }

    private function getCartSubtotal()
    {
        //
    }
}
