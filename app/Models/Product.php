<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\SubCategory;
use App\Models\Pay;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'colors',
        'sizes',
        'cover',
        'quantity',
        'sub_category_id'
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function getCategories(){
        return DB::table('sub_categories')->cursor();
    }

    public function getAllProducts(){
        return Product::cursor();
    }

    public function getProductsWithImages($category){
        return Category::with('products')->where('name_en', $category)->first()->products;
    }

    public function users(){
        return $this->belongsToMany(User::class, 'carts');
    }

    public function pay(){
        return $this->hasOne(Pay::class);
    }

}
