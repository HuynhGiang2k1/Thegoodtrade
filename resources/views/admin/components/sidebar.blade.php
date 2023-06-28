<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2
    text-white min-vh-100" style="background-color: #263544; border-right: 1px solid #ccc">
    <ul class="nav nav-pills flex-column mb-sm-auto align-items-center align-items-sm-start" id="menu">
        <li class="w-100">
            <a href="{{route('admin.products.create')}}" class="nav-link
                        px-0">
                <span class="d-none
                        d-sm-inline" style="color:#b7c0cd;">Thêm mới</span></a>
        </li>
        <li>
            <a href="{{route('admin.products.index')}}" class="nav-link
                        px-0"> <span class="d-none
                        d-sm-inline" style="color:#b7c0cd;">Danh sách</span></a>
        </li>
        <li>
            <a href="{{route('admin.category')}}" class="nav-link px-0"> <span class="d-none
                        d-sm-inline" style="color:#b7c0cd;">Danh mục</span></a>
        </li>
        <li>
            <a href="{{route('admin.category.sub')}}" class="nav-link px-0"> <span class="d-none
                        d-sm-inline" style="color:#b7c0cd;">Danh mục phụ</span></a>
        </li>
        <li>
            <a href="{{route('admin.user')}}" class="nav-link px-0"> <span class="d-none
                        d-sm-inline" style="color:#b7c0cd;">Danh sách user</span></a>
        </li>
        <li>
            <a href="{{route('admin.order.pending')}}" class="nav-link px-0"> <span class="d-none
                        d-sm-inline" style="color:#b7c0cd;">Đơn hàng đang đặt</span></a>
        </li>
        <li>
            <a href="{{route('admin.order.success')}}" class="nav-link px-0"> <span class="d-none
                        d-sm-inline" style="color:#b7c0cd;">Đơn hàng thành công</span></a>
        </li>
    </ul>
</div>
