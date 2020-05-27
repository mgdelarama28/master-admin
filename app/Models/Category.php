<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image_path',
    ];

    /** 
     * Relationships
     * 
     * 
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /** 
     * Renders
     * 
     * 
     */
    public function renderImage()
    {
        return asset('storage/' . $this->image_path);
    }
}
