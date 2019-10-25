<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='images';

    public function user(){
        return $this->belongsTo(Product::class);
    }
}
