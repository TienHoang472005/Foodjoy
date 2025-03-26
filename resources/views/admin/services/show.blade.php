@extends('layouts.admin')
@section('title', 'Xem chi tiết')
@section('content')

    <div class="container">
        <div class="mb-3">
            <label for="category_id" class="form-label">Danh mục</label>
            <p>{{ $category['name'] }}</p>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Tên dịch vụ</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $service['name'] }}" readonly>
        </div>
        <div class="mb-3">  
            <label for="img_thumbnail" class="form-label">Ảnh</label>
            <img src="{{ file_url($service['img_thumbnail']) }}" alt="" height="50" width="50">
        </div>
        <div class="mb-3">
            <label for="overview" class="form-label">Mô tả tổng quan</label>
            <input type="text" class="form-control" id="overview" name="overview" value="{{ $service['overview'] }}" readonly>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <input type="text" class="form-control" id="content" name="content" value="{{ $service['content'] }}" readonly>
        </div>
    </div>
@endsection
