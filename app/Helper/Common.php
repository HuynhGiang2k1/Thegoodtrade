<?php

namespace App\Helper;

use App\Models\Category;

class Common
{
    public static function getCategories(){
        return Category::with('subCategories')->get();
    }
}
