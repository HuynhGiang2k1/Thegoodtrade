@extends('admin.master_layout')

@section('content')
<div class="d-flex justify-content-between gap-5" style="width: max-content;
    min-width: 1200px; padding-top:20px; background-color: #263544;">
    <div class="card" style="width: 500px; height: max-content; margin-left: 20px; color:#b7c0cd; background-color: #263544;; border:none;">
        <div class="card-header" style="border-bottom: 1px solid #ccc">
            <h3>Thêm mới</h3>
        </div>
        <div class="card-body">
            <form action="{{route('admin.category.sub.store')}}" method="post" enctype="multipart/form-data">
                <div class="mt-2">
                    <lable>Tên danh mục:</lable>
                    <input type="text" class="form-control" name="name">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-2" style="color:#b7c0cd">
                    <label>Danh mục:</label>
                    <select class="form-select" aria-label="Default select example" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div style="width:100%; text-align: right;"><button type="submit" class="btn btn-success mt-4">Thêm mới</button></div>
                @csrf
            </form>
        </div>
    </div>

    <div class="card" style="height: max-content; flex-grow: 1;color:#b7c0cd; background-color: #263544; border: none">
        <div class="card-header" style="border-bottom: 1px solid #ccc; box-shadow: none;">
            <h3>Danh mục</h3>
        </div>
        <div class="card-body" style="color:#b7c0cd">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col" style="color:#b7c0cd">Mã D.Mục</th>
                        <th scope="col" style="color:#b7c0cd">Tên danh mục</th>
                        <th scope="col" style="color:#b7c0cd">Loại</th>
                        <th scope="col" colspan="2" style="color:#b7c0cd">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listCategories as $category)
                    <tr>
                        <th scope="row" style="color:#b7c0cd">{{$category->id}}</th>
                        <td style="color:#b7c0cd">{{$category->name}}</td>
                        <td style="color:#b7c0cd">{{$category->category->name}}</td>
                        <td style="color:#b7c0cd">
                            <a href="" data-bs-toggle="modal" data-bs-target="#updateModal" data-category-name="{{$category->name}}" data-category-id="{{$category->id}}">
                                <i class="fa-solid fa-pen" style="color:#b7c0cd"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal{{$category->id}}">
                                <i class="fa-solid fa-trash" style="color:#b7c0cd"></i>
                            </a>
                        </td>
                    </tr>

                    {{-- DeleteModel--}}
                    <div class="modal fade" id="modal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có muốn xóa {{$category->name}} hay không ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                                    <a href="{{route('admin.subCategory.destroy',[$category->id])}}" class="btn
                                        btn-danger">Xóa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- UpdateModal--}}
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateModalLabel">New
                            message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.subCategory.update')}}" method="post">
                            <input type="hidden" name="id" id="category-id">
                            <div class="mb-3">
                                <label for="category-name" class="col-form-label">Tên danh mục:</label>
                                <input type="text" class="form-control" id="category-name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="category-name" class="col-form-label">Tên tiếng anh:</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            @csrf
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở lại</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const updateModal = document.getElementById('updateModal')
    updateModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const categoryName = button.getAttribute('data-category-name')

        const categoryId = button.getAttribute('data-category-id')

        const modalTitle = updateModal.querySelector('.modal-title')
        const categoryInput = updateModal.querySelector('#category-name')
        const categoryIdInput = updateModal.querySelector('#category-id')


        modalTitle.textContent = `Sửa danh mục ${categoryName}`
        categoryInput.value = categoryName
        categoryIdInput.value = categoryId
    })
</script>

@endsection
