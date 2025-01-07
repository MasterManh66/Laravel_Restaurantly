<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'sale', 'category_id', 'description', 'image', 'status'];

    //Join với bảng Category . 1 pro thuộc 1 cat
    public function cat() {
        return $this->hasOne(Category::class, 'id', 'category_id');  //model liên kết , khoá chính, khoá ngoại
    }
}
