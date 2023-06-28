@extends('clients.mypage.mypage')

@section('mypage-content')
<div class="information">
    <p>Thông tin cá nhân</p>
    <table>
        <tr>
            <th>Họ tên : </th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Email : </th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Địa chỉ : </th>
            <td>{{$user->address}}</td>
        </tr>
        <tr>
            <th>Số điện thoại : </th>
            <td>{{$user->phone}}</td>
        </tr>
    </table>
</div>
@endsection