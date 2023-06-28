<?php

namespace App\Actions\Admin\Category;

use App\Models\SubCategory;

class DeleteSubCategoryAction
{
    public static function execute($id) {
        return SubCategory::where('id', $id)->delete();
    }
}
