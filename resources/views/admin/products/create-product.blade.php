@extends('admin.master_layout')

@section('content')
    <div class="container" style="margin-bottom: 50px;">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <!-- <h3 class="text-center text-danger">Thêm mới sản phẩm</h3> -->
                <div class="form-group" style="margin-top:30px">
                    <form action="{{route('admin.products.store')}}" method="post"
                          method="post" enctype="multipart/form-data">
                        <div class="mt-2" style="margin-bottom:20px">
                            <label style="color:#b7c0cd; display: inline-block; margin-bottom: 5px;">Tên sản phẩm:</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2" style="margin-bottom:20px">
                            <label style="color:#b7c0cd; display: inline-block; margin-bottom: 5px;">Giá:</label>
                            <input type="text" class="form-control" name="price">
                            @error('price')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2" style="margin-bottom:20px">
                            <label style="color:#b7c0cd; display: inline-block; margin-bottom: 5px;">Số lượng:</label>
                            <input type="text" class="form-control" name="quantity">
                            @error('quantity')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2" style="margin-bottom:20px">
                            <label style="color:#b7c0cd; display: inline-block; margin-bottom: 5px;">Mô tả:</label>
                            <textarea class="form-control" id="floatingTextarea2" style="height: 120px"
                                      name="description"
                            ></textarea>
                        </div>
                        <div class="mt-2" style="margin-bottom:20px">
                            <label style="color:#b7c0cd; display: inline-block; margin-bottom: 5px;">Ảnh chính:</label>
                            <input type="file" class="form-control" name="cover" >
                            @error('cover')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mt-2" style="margin-bottom:20px">
                            <label style="color:#b7c0cd; display: inline-block; margin-bottom: 5px;">Ảnh phụ:</label>
                            <input type="file" class="form-control" name="images[]"
                                   multiple>
                        </div>
                        <div class="mt-2" style="margin-bottom:20px">
                            <label style="color:#b7c0cd; display: inline-block; margin-bottom: 5px;">Danh mục:</label>
                            <select class="form-select" aria-label="Default select example"
                                    name="category_id">
                                @foreach($categories as $category)
                                    <option
                                        value="{{$category->id}}">{{$category->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label style="color:#b7c0cd; display: inline-block; margin-bottom: 5px;">Size:</label>
                            
                            <div style="display: flex; align-items: center; flex-direction: row; width: 460px; justify-content: space-between;">
                                @foreach($sizes as $size)
                                <div style="display: flex; align-items: center; flex-direction: column;">
                                        <input style="cursor: pointer; width:20px; height:20px; margin-bottom: 5px;" type="checkbox" id="{{"size.$size"}}"
                                               name="sizes[]" value="{{$size}}" >
                                        <label style="color:#b7c0cd;" for="{{"size.$size"}}">{{$size}}</label><br>
                                    </div>
                                        @endforeach
                            </div>
                        </div>
                        <div class="d-flex gap-3 mt-2 flex-lg-wrap">
                            <label style="color:#b7c0cd; display: inline-block; margin-bottom: 5px;">Color:</label>
                            @foreach($colors as $color)
                                <div>
                                    <input style="cursor: pointer; width:20px; height:20px;" type="checkbox" id="{{"color.$color"}}"
                                           name="colors[]" value="{{$color}}">
                                    <label  style="color:#b7c0cd;" for="{{"color.$color"}}">{{$color}}</label><br>
                                </div>
                            @endforeach
                        </div>
                        <div style="width: 100%; text-align: center;"><button type="submit" class="btn btn-success mt-4" style="padding: 5px 30px;">Thêm mới</button></div>
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
