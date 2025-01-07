@extends('admin.master')
@section('body')
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" />
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Giá sản phẩm</label>
            <input type="text" name="price" class="form-control" value="{{ old('price', $product->price) }}" />
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Khuyến mãi</label>
            <input type="text" name="sale" class="form-control" value="{{ old('sale', $product->sale) }}" />
            @error('sale')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Danh mục</label>
            <select name="category_id" class="form-control">
                <option>Chọn danh mục</option>
                @foreach ($pro as $item)
                    <option value="{{ $item->id }}" @selected($item->id == $product->category_id)>{{ $item->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Ảnh sản phẩm</label>
            <input type="file" name="image" class="form-control" />
            <br>
            <img src="{{ asset('uploads/' . $product->image) }}" alt="Ảnh sản phẩm" width="250">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea class="form-control" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="">Trạng thái</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="status" value="1" @checked(old('status', $product->status) == 1)>
                <label class="form-check-label">Hiển thị</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="status" value="0" @checked(old('status', $product->status) == 0)>
                <label class="form-check-label">Đang ẩn</label>
            </div>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto mb-2">
            <button class="btn btn-primary w-100" type="submit">Cập nhật sản phẩm</button>
        </div>
    </form>
@stop
