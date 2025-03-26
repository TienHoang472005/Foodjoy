@extends('layouts.admin')
@section('title', 'Thêm mới')
@section('content')

    <div class="container">
        <form action="{{ route('admin/services/store') }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục</label>
                <select class="form-select form-select-lg" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Tên dịch vụ</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="img_thumbnail" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
            </div>
            <div class="mb-3">
                <label for="overview" class="form-label">Mô tả tổng quan</label>
                <input type="text" class="form-control" id="overview" name="overview">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>
            <button type="reset" class="btn btn-primary">Nhập lại</button>
            <button type="submit" class="btn btn-success">Xác nhận</button>
        </form>
    </div>
@endsection
