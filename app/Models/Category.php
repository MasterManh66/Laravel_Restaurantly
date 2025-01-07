<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

    // 1 cat có n pro
    public function pro() {
        return $this->hasMany(Product::class, 'category_id', 'id'); 
    }
}
