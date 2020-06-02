<?php

namespace App\Http\Controllers\Web\API;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Helpers\CartHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    private $cart;

    public function __construct(CartHelper $cart)
    {
        $this->cart = $cart;
    }

    public function store($id)
    {
        $cart = $this->cart->getCart();

        $product = Product::find($id);
        $cartItem = CartItem::where('product_id', $product->id)->first();

        if (!$cartItem):
            $cartItem = CartItem::create([
                'product_id' => $product->id,
                'cart_id' => $cart->id,	
                'total' => $product->price,
            ]);
        else:
            $cartItem->quantity += 1;
            $cartItem->total = $cartItem->quantity * $cartItem->product->price;
            $cartItem->save();
        endif;
                
        return response()->json([
            'cart' => $cart->with('cartItems')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $cartItem = CartItem::find($id);
        $quantity = $request->input('quantity');
        $data['quantity'] = $request->input('quantity');
        $data['total'] = $request->input('quantity') * $cartItem->product->price;

        $cartItem->update($data);

        return response()->json([
            'cartItem' => $cartItem,
        ]);
    }

    public function destroy($id)
    {
        $cart = Cart::where([
            'session_id' => session()->getId(),
            'status' => 0,])
            ->first();

        $cartItem = CartItem::where([
            'id' => $id,
            'cart_id' => $cart->id,
        ]);

        $cartItem->delete();

        return 204;
    }
}
