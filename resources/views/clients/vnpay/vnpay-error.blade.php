@extends('clients.master-layout')

@section('content')
<div class="main" style="display: flex; align-items: center; justify-content: center; min-height: 500px; min-height: 600px;">
    <div class="wrapper-vnpay-result">
        <span class="title-vnpay-result">
            Giao dịch không thành công! Vui lòng thử lại hoặc liên hệ đường dây nóng (1234567890) để được hỗ trợ.
            (Hotline hoạt động mỗi ngày từ 8h - 22h)
        </span>
        <div class="vnpay-result-line"></div>
        <table style="text-align: left">
            <tr>
                <th>Số tiền: </th>
                <td>@money($vnpAmount)</td>
            </tr>
            <tr>
                <th>Mô tả hóa đơn: </th>
                <td>{{$title}}</td>
            </tr>
            <tr>
                <th>Ngày thực hiện: </th>
                <td>{{$date}}</td>
            </tr>
            <tr>
                <th>Sổ giao dịch: </th>
                <td>{{$vnpTransactionNo}}</td>
            </tr>
        </table>
        <div style="text-align:center; font-size: 15px;"><a href="/">Quay lại trang chủ</a></div>
    </div>
</div>
@endsection