@extends('admin.master')
@section('body')
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nhập tên sản phẩm" />
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Giá sản phẩm</label>
            <input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="Nhập giá sản phẩm" />
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Khuyến mãi</label>
            <input type="text" name="sale" class="form-control" value="{{ old('sale') }}" placeholder="Nhập giá khuyến mãi" />
            @error('sale')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Danh mục</label>
            <select name="category_id" class="form-control">
                <option value="">Chọn danh mục</option>
                @foreach ($pro as $item)
                    <option value="{{ $item->id }}" @selected(old('category_id') == $item->id)>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <input type="file" name="image" class="form-control" />
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea class="form-control" name="description" placeholder="Viết mô tả sản phẩm ở đây">{{ old('description') }}</textarea>
            @error('description')
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
            <button type="submit" class="btn btn-success w-100">Thêm mới sản phẩm</button>
        </div>
    </form>
@stop
