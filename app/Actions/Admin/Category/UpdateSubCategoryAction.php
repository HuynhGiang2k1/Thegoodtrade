<?php

namespace App\Actions\Admin\Category;

use App\Models\SubCategory;

class UpdateSubCategoryAction
{
    public static function execute($id, $name) {
        return SubCategory::where('id', $id)
            ->update([
                'name' => $name
            ]);
    }
}
