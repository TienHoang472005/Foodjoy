@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4"><i class="fas fa-tachometer-alt"></i> Dashboard</h3>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Sản phẩm</h6>
                        <h4 class="text-danger fw-bold">120</h4>
                    </div>
                    <i class="fas fa-box fa-2x text-danger"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Danh mục</h6>
                        <h4 class="text-danger fw-bold">10</h4>
                    </div>
                    <i class="fas fa-tags fa-2x text-danger"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted">Người dùng</h6>
                        <h4 class="text-danger fw-bold">34</h4>
                    </div>
                    <i class="fas fa-users fa-2x text-danger"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h5>Hoạt động gần đây</h5>
        <ul class="list-group shadow-sm">
            <li class="list-group-item">Admin đã thêm sản phẩm mới: <strong>Pizza Pepperoni</strong></li>
            <li class="list-group-item">Người dùng <strong>hoang123</strong> vừa đăng ký tài khoản</li>
            <li class="list-group-item">Danh mục <strong>Đồ uống</strong> vừa được cập nhật</li>
        </ul>
    </div>
</div>
@endsection
