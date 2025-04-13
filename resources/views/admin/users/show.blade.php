@extends('admin.layouts.app')

@section('title', 'Chi tiết người dùng')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Chi tiết người dùng</h4>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
            <li class="list-group-item"><strong>Tên:</strong> {{ $user->name }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
            <li class="list-group-item"><strong>Vai trò:</strong> {{ $user->role }}</li>
            <li class="list-group-item"><strong>Ngày tạo:</strong> {{ $user->created_at }}</li>
            <li class="list-group-item"><strong>Cập nhật lúc:</strong> {{ $user->updated_at }}</li>
        </ul>
        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
</div>
@endsection
