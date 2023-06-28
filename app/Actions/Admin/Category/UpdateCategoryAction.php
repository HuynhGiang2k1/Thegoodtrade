<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class UpdateCategoryAction
{
    public static function execute($id, $name, $name_en){
        return Category::where('id', $id)->update([
            'name' => $name,
            'name_en' => $name_en
        ]);
    }
}
