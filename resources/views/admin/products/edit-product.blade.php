@extends('admin.master_layout')

@section('content')
    <div class="container form-control-admin">
        <div class="row">
            <div class="col-lg-3">
                <p>Cover:</p>
                <img src="{{asset('cover/'.$product->cover)}}"
                     alt="{{$product->cover}}" style="max-width: 100px;
                                     max-height: 100px">
                <br>
                <p>Images:</p>
                @foreach($images as $image)
                    <form action="{{route('admin.delete.image', [$image])}}" method="post">
                        <button type="submit" class="btn text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </button>
                        @csrf
                        @method('delete')
                    </form>
                    <img src="{{asset('images/'.$image->image)}}"
                         alt="{{$image->image}}" style="max-width: 100px;
                                     max-height: 100px">
                    <br>
                @endforeach
            </div>
            <div class="col-lg-6">
                <h3 class="text-center text-danger">Sửa sản phẩm</h3>
                <div class="form-group">
                    <form action="{{route('admin.products.update', [$product])}}"
                          method="post"
                          enctype="multipart/form-data">
                        @method('put')
                        <div class="mt-2">
                            <label>Tên sản phẩm:</label>
                            <input type="text" class="form-control" name="name"
                                   value="{{$product->name}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label>Giá:</label>
                            <input type="text" class="form-control" name="price"
                                   value="{{$product->price}}">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label>Số lượng:</label>
                            <input type="text" class="form-control" name="quantity"
                                   value="{{$product->quantity}}">
                            @error('quantity')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label>Mô tả:</label>
                            <textarea class="form-control" id="floatingTextarea2" style="height: 120px"
                                      name="description"
                            >{{$product->description}}</textarea>
                        </div>
                        <div class="mt-2">
                            <label>Ảnh chính:</label>
                            <input type="file" class="form-control" name="cover">
                            @error('cover')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label>Ảnh phụ:</label>
                            <input type="file" class="form-control" name="images[]"
                                   multiple>
                        </div>
                        <div class="mt-2">
                            <label>Danh mục:</label>
                            <select class="form-select" aria-label="Default select example"
                                    name="category_id">
                                @foreach($categories as $category)
                                    @if($product->sub_category_id == $category->id)
                                        <option selected
                                            value="{{$category->id}}">{{$category->name}}
                                        </option>
                                    @else
                                        <option
                                            value="{{$category->id}}">{{$category->name}}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex gap-4 mt-2">
                            <label>Size:</label>
                            @php
                                $ps = $product->sizes;
                                $ps = explode('@@', $ps);
                            @endphp
                            @foreach($sizes as $size)
                                <div>
                                    @if(in_array($size, $ps))
                                        <input type="checkbox" checked id="{{"size.$size"}}"
                                               name="sizes[]" value="{{$size}}">
                                    @else
                                        <input type="checkbox" id="{{"size.$size"}}"
                                               name="sizes[]" value="{{$size}}">
                                    @endif
                                    <label for="{{"size.$size"}}">{{$size}}</label><br>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex gap-3 mt-2 flex-lg-wrap">
                            <label>Color:</label>
                            @php
                                $pc = $product->colors;
                                $pc = explode('@@', $pc);
                            @endphp
                            @foreach($colors as $color)
                                <div>
                                    @if(in_array($color, $pc))
                                        <input type="checkbox" checked id="{{"color.$color"}}"
                                               name="colors[]" value="{{$color}}">
                                    @else
                                        <input type="checkbox" id="{{"color.$color"}}"
                                               name="colors[]" value="{{$color}}">
                                    @endif
                                    <label for="{{"color.$color"}}">{{$color}}</label><br>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-success mt-4">Sửa</button>
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
