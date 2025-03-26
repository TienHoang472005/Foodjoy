@extends('layouts.admin')
@section('title', 'Danh sách')
@section('content')

<div class="container">
    <a href="{{ route('admin/services/create') }}" class="btn btn-success">Thêm mới</a>
    <table class="table">
        <thead>
            <th>Id</th>
            <th>Danh mục</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Mô tả tổng quan</th>
            <th>Nội dung</th>
            <th>Ngày tạo</th>
            <th>Ngày chỉnh sửa</th>
            <th>Hành động</th>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td>{{ $service['id'] }}</td>
                <td>{{ $service['category_name'] }}</td>
                <td>{{ $service['name'] }}</td>
                <td><img src="{{ file_url( $service['img_thumbnail'] ) }}" alt="" height="50" width="50"></td>
                <td>{{ $service['overview'] }}</td>
                <td>{{ $service['content'] }}</td>
                <td>{{ !empty($service['created_at']) ? date('d-m-Y H:i:s', strtotime($service['created_at'])) : "" }}</td>
                <td>{{ !empty($service['updated_at']) ? date('d-m-Y H:i:s', strtotime($service['updated_at'])) : "" }}</td>
                <td>
                    <a href="{{ route('admin/services/'). $service['id']. '/show' }}"  class="btn btn-primary">Xem</a>
                    <a href="{{ route('admin/services/'). $service['id']. '/edit' }}"  class="btn btn-warning">Sửa</a>
                    <form action="{{ route('admin/services/'). $service['id']. '/delete' }}" method="post"
                    onsubmit="return confirm('Bạn có chắc muốn xóa không?')">   
                        <button class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection