<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'category_id',
        'price',
        'quantity',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
