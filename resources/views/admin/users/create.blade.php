@extends('admin.layouts.app')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success')}}
    </div>  
@endif
@if (session('error'))
    <div class="alert alert-error">
        {{ session('error')}}
    </div>  
@endif
@section('title', 'Thêm người dùng')
@section('content')

    <div class="card">
        <div class="card-header">
            <h4>Thêm người dùng</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Tên người dùng</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập họ tên...">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập email...">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu...">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu...">
                    @if ($errors->has('password'))
                    @if (str_contains($errors->first('password'), 'xác nhận'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                @endif
                </div>
                <button class="btn btn-success" type="submit">Thêm người dùng</button>
            </form>
        </div>

    </div>
@endsection
