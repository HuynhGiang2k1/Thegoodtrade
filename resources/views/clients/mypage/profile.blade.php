@extends('clients.mypage.mypage')

@section('mypage-content')
    <form action="{{route('my.update-profile')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="information ">
    <p>Chỉnh sửa thông tin cá nhân</p>
    <table>
        <tr>
            <th><label for="">Họ và tên : </label></th>
            <td><input type="text" name="name" value="{{$user->name}}"></td>
        </tr>
        <tr>
            <th><label for="">Email : </label></th>
            <td><input type="text" disabled value="{{$user->email}}"></td>
        </tr>
        <tr>
            <th><label for="">Mật khẩu mới : </label></th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th><label for="">Nhập lại mật khẩu : </label></th>
            <td><input type="password" name="password_confirm"></td>
        </tr>
        <tr>
            <th><label for="">Số điện thoại : </label></th>
            <td><input type="text" name="phone" value="{{$user->phone}}"></td>
        </tr>
        <tr>
            <th><label for="">Địa chỉ : </label></th>
            <td><input type="text" name="address" value="{{$user->address}}"></td>
        </tr>
        <tr>
            <th><label for="">Ảnh đại diện : </label></th>
            <td><input type="file" name="avatar" class="information-img"></td>
        </tr>
    </table>
    <div class="information-btn"><button type="submit">Sửa thông tin</button></div>
</div>
    </form>
@endsection
