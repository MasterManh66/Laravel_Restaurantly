@extends('admin.master')
@section('body')
    <form action="{{ route('category.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nhập tên danh mục" />
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Trạng thái</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="status" value="1" @checked(old('status', 1) == 1)>
                <label class="form-check-label">Hiển thị</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="status" value="0" @checked(old('status') == 0)>
                <label class="form-check-label">Đang ẩn</label>
            </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto mb-2">
            <button type="submit" class="btn btn-success w-100">Thêm mới danh mục</button>
        </div>
    </form>
@stop
