<?php

namespace App\Models;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'session_id',
        'status',
        'subtotal',
        'total',
    ];

    /** 
     * Relationships
     * 
     * 
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Getters
     * 
     * 
     */
    public function getSubtotal()
    {
        return $subtotal = $this->cartItems->sum('total');
    }

    /**
     * Find the session cart
     * 
     * @return mixed $cart
     */
    public function getSessionCart()
    {
        return $this->with('cartItems.product')->where([
            'session_id' => session()->getId(),
            'status' => 0,
        ])
        ->latest()
        ->first();
    }

    /**
     * Find or create a session cart
     * 
     * @return mixed $cart
     */
    public function getOrCreateSessionCart()
    {
        $session =  session()->getId();

        return $this->getSessionCart() ? $this->getSessionCart() : $this->create(['session_id' => $session]);
    }
}
