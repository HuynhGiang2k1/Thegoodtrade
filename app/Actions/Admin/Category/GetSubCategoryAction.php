<?php

namespace App\Actions\Admin\Category;

use App\Models\SubCategory;

class GetSubCategoryAction
{
    public static function execute(){
        return SubCategory::with('category')->get();
    }
}
