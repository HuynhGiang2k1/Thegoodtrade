<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class GetCategoryAction
{
    public static function execute(){
        return Category::cursor();
//        return Category::truncate();
    }
}
