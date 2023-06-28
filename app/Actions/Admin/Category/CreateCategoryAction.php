<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class CreateCategoryAction
{
    public static function execute($name, $name_en){
        return  Category::insert([
            'name'=> $name,
            'name_en' => $name_en,
            'created_at' => now()
        ]);
    }
}
