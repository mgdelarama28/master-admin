<?php

namespace App\Models;

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
}
