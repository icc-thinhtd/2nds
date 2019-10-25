<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\User;

class Product extends Model
{
    protected $table = 'products';

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product_images(){
        return $this->hasMany(Image::class);
    }
}
