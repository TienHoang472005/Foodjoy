@extends('admin.layouts.app')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
@section('title', 'Danh sách người dùng')
@section('content')

    <div class="container">
        <h2>Danh sách người dùng</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm người dùng</a>
        <hr>
        <form method="get" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm người dùng..."
                    value="{{ request('search') }}">

                <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>        
            </div>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên người dùng</th>
                    <th>Email</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="display: flex; align-items: center; gap: 5px;">
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-success">Xem</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
                            {{-- <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
@endsection
