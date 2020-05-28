<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'price',
        'image_path',
    ];

    /** 
     * Relationships
     * 
     * 
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cartItem()
    {
        return $this->hasOne(CartItem::class);
    }

    /** 
     * Renders
     * 
     * 
     */
    public function renderDescription()
    {
        if ($this->description):
            return $this->description;
        endif;

        return 'No description to show.';
    }

    public function renderImage()
    {
        return asset('storage/' . $this->image_path);
    }
}
