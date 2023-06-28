<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    protected $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->getAllProducts();
        return view('admin.products.list-products' ,compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->product->getCategories();
        $colors = ['Đen', 'Xanh Blue', 'Nâu' ,'Xanh lá', 'Xám' ,'Ánh kim','Nhiều màu',
            'Trung tính', 'Cam', 'Hồng', 'Tím', 'Đỏ', 'Trắng', 'Vàng'];
        $sizes = [34,35,36,37,38,39,40,41, 'XXS', 'XS', 'S', 'M', 'L','XL','R'];
        return view('admin.products.create-product', compact('categories', 'colors', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('cover')){
            $file = $request->file("cover");
            $imageName = $file->hashName();
            $file->move(\public_path("cover/"), $imageName);

            $product = new Product([
                "name" => $request->name,
                "price" => $request->price,
                "quantity" => $request->quantity,
                "description" => $request->description,
                "cover" => $imageName,
                "sub_category_id" => $request->category_id,
                "sizes" => implode('@@',$request->sizes),
                "colors" => implode('@@',$request->colors)
            ]);
            $product->save();
            if($request->hasFile("images")){
                $files = $request->file("images");
                foreach ($files as $file){
                    $imageName = $file->hashName();
                    $file->move(\public_path("images/"), $imageName);
                    Image::create([
                        "image" => $imageName,
                        "product_id" => $product->id
                    ]);
                }
            }
        }
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $images = $product->images;
        $categories = $this->product->getCategories();
        $colors = ['Đen', 'Xanh Blue', 'Nâu' ,'Xanh lá', 'Xám' ,'Ánh kim','Nhiều màu',
            'Trung tính', 'Cam', 'Hồng', 'Tím', 'Đỏ', 'Trắng', 'Vàng'];
        $sizes = [34,35,36,37,38,39,40,41, 'XXS', 'XS', 'S', 'M', 'L','XL','R'];

        return view('admin.products.edit-product', compact('product', 'categories', 'colors', 'images', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->sub_category_id = $request->category_id;
        $product->sizes = implode('@@',$request->sizes);
        $product->colors = implode('@@',$request->colors);

        if ($request->hasFile('cover')){
            if(File::exists("cover/".$product->cover)){
                File::delete("cover/".$product->cover);
            }
            $file = $request->file("cover");
            $imageName = $file->hashName();
            $file->move(\public_path("cover/"), $imageName);
            $product->cover = $imageName;
            if($request->hasFile("images")){
                $files = $request->file("images");
                foreach ($files as $file){
                    $imageName = $file->hashName();
                    $file->move(\public_path("images/"), $imageName);
                    Image::create([
                        "image" => $imageName,
                        "product_id" => $product->id
                    ]);
                }
            }
        }
        $product->save();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(File::exists("cover/".$product->cover)){
            File::delete("cover/".$product->cover);
        }
        $images = $product->images;
        foreach ($images as $image){
            if(File::exists("images/".$image->image)){
                File::delete("images/".$image->image);
            }
        }
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    public function deleteImagge(Image $image){
        if(File::exists("images/".$image->image)){
            File::delete("images/".$image->image);
        }
        $image->delete();
        return back();
    }
}
