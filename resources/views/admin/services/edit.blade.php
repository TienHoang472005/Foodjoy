@extends('layouts.admin')
@section('title', 'Sửa')
@section('content')

    <div class="container">
        <form action="{{ route('admin/services/'). $service['id']. '/update' }}" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục</label>
                <select class="form-select" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}"
                            {{ $category['id'] == $service['category_id'] ? 'selected' : '' }}>{{ $category['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Tên dịch vụ</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $service['name'] }}">
            </div>
            <div class="mb-3">
                <label for="img_thumbnail" class="form-label">Ảnh cũ</label>
                <img src="{{ file_url( $service['img_thumbnail'] ) }}" alt="" height="50" width="50">
                <label for="img_thumbnail" class="form-label">Ảnh</label>
                <input type="file" class="form-control" id="img_thumbnail" name="img_thumbnail">
            </div>
            <div class="mb-3">
                <label for="overview" class="form-label">Mô tả tổng quan</label>
                <input type="text" class="form-control" id="overview" name="overview" value="{{ $service['overview'] }}" >
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <input type="text" class="form-control" id="content" name="content" value="{{ $service['content'] }}">
            </div>
            <button type="reset" class="btn btn-primary">Nhập lại</button>
            <button type="submit" class="btn btn-success">Xác nhận</button>
        </form>
    </div>
@endsection
