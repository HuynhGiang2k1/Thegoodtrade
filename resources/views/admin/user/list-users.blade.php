@extends('admin.master_layout')

@section('content')
    <div class="container" style="margin-top:20px;">
        <div style="margin-top:20px">
            <table class="table">
                <thead>
                <tr>
                    <th style="color:#b7c0cd">Tên khách hàng</th>
                    <th style="color:#b7c0cd">Email</th>
                    <th style="color:#b7c0cd">Số điện thoại</th>
                    <th style="color:#b7c0cd">Địa chỉ</th>
                    <th style="color:#b7c0cd">Trạng thái</th>
                    <th colspan="2" style="color:#b7c0cd">Tác vụ</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr >
                        <td style="color:#b7c0cd;">{{$user->name}}</td>
                        <td style="color:#b7c0cd">{{$user->email}}</td>
                        <td style="color:#b7c0cd">{{$user->phone}}</td>
                        <td style="color:#b7c0cd">{{$user->address}}</td>
                        @if($user->email_verified_at)
                            <td style="color:green">Đã xác thực</td>
                        @else
                            <td style="color:red">Chưa xác thực</td>
                        @endif
                        <td>
                            <form action="{{route('admin.user.delete',
                                [$user])}}" method="post">
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
