<?php

namespace App\Http\Controllers;

use App\Actions\Admin\Category\CreateCategoryAction;
use App\Actions\Admin\Category\DeleteCategoryAction;
use App\Actions\Admin\Category\DeleteSubCategoryAction;
use App\Actions\Admin\Category\GetCategoryAction;
use App\Actions\Admin\Category\GetSubCategoryAction;
use App\Actions\Admin\Category\UpdateCategoryAction;
use App\Actions\Admin\Category\UpdateSubCategoryAction;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\Product\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $category;

    public function index(){
        $listCategories = GetCategoryAction::execute();
        return view('admin.products.category', compact('listCategories'));
    }

    public function store(CategoryRequest $request){
        CreateCategoryAction::execute($request->name, $request->name_en);
        return redirect()->route('admin.category');
    }

    public function destroy($id){
        DeleteCategoryAction::execute($id);
        return redirect()->route('admin.category');
    }

    public function subDestroy($id){
        DeleteSubCategoryAction::execute($id);
        return redirect()->route('admin.category.sub');
    }

    public function update(CategoryRequest $request){
        UpdateCategoryAction::execute($request->id, $request->name, $request->name_en);
        return redirect()->route('admin.category');
    }

    public function updateSub(Request $request){
        UpdateSubCategoryAction::execute($request->id, $request->name);
        return redirect()->route('admin.category.sub');
    }

    public function subCategories(SubCategory $category){
        $categories = GetCategoryAction::execute();
        $listCategories = GetSubCategoryAction::execute();
        return view('admin.products.category-sub', compact('listCategories', 'categories'));
    }

    public function subCategoriesStore(SubCategoryRequest $request){
        DB::table('sub_categories')->insert([
            'name' => $request->name,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('admin.category.sub');
    }
}
