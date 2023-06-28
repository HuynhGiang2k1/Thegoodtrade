@extends('admin.master_layout')

@section('content')
<div class="container" style="margin-top:20px;">
    <!-- <h3 class="text-center text-danger">Danh sách sản phẩm</h3> -->
    <a href="{{route('admin.products.create')}}" class="btn btn-outline-success" style="color:#b7c0cd; border: 1px solid #b7c0cd;">Thêm sản phẩm</a>
    <div style="margin-top:20px">
        <table class="table">
            <thead>
                <tr>
                    <th style="color:#b7c0cd">ID</th>
                    <th style="color:#b7c0cd">Tên sản phẩm</th>
                    <th style="color:#b7c0cd">Giá</th>
                    <th style="color:#b7c0cd">Số lượng</th>
                    <th style="color:#b7c0cd">Hình ảnh</th>
                    <th colspan="2" style="color:#b7c0cd">Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr >
                    <td style="color:#b7c0cd;">{{$product->id}}</td>
                    <td style="color:#b7c0cd;">{{$product->name}}</td>
                    <td style="color:#b7c0cd">{{$product->price}}</td>
                    <td style="color:#b7c0cd">{{$product->quantity}}</td>
                    <td style="color:#b7c0cd">
                        <img src="{{asset('cover/'.$product->cover)}}" alt="{{$product->cover}}" style="max-width: 80px;
                                     max-height: 80px; border-radius: 4px;">
                    </td>
                    <td>
                        <a href="{{route('admin.products.edit', [$product])}}" class="btn
                                btn-warning">Sửa</a>
                    </td>
                    <td>
                        <form action="{{route('admin.products.destroy',
                                [$product])}}" method="post">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn ' +
                                             'không ?')">Xóa</button>
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection