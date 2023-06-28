<?php

namespace App\Actions\Admin\Category;

use App\Models\Category;

class DeleteCategoryAction
{
    public static function execute($id){
        return Category::where('id',$id)->delete();
    }
}
