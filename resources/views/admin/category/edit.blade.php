@extends('admin.master')
@section('body')
    <form action="{{ route('category.update', $category->id) }}" method="post">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" />
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Trạng thái</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="status" value="1" @checked(old('status', $category->status) == 1)>
                <label class="form-check-label">Hiển thị</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="status" value="0" @checked(old('status', $category->status) == 0)>
                <label class="form-check-label">Đang ẩn</label>
            </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto mb-2">
            <button class="btn btn-primary w-100" type="submit">Cập nhật danh mục</button>
        </div>
    </form>
@stop
