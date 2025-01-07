@extends('admin.master')
@section('title', 'Product Manager')
@section('body') 
<div class="card">
    <div class="card-header">
      <div class="card-title">Basic Table</div>
    </div>
    <div class="card-body">
      <div class="card-sub">
        <form class="form-inline" action="">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter name ...">
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
          <a href="{{ route('product.create') }}" class="btn btn-warning"><i class="fa fa-plus"></i> Add new</a>
      </div>
      <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Price/Sale</th>
            <th scope="col">Satus</th>
            <th scope="col">Created</th>
            <th scope="col">Image</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->cat->name }}</td> 
                <td>{{ $item->price }} / {{ $item->sale }}</td>
                <td>{{ $item->status == 0 ? "Đang ẩn" : "Hiện thị" }}</td>
                <td>{{ $item->created_at->format('d/m/y') }}</td>
                <td style="width: 100px">
                    <img src="uploads/{{ $item->image }}" style="width:100%; border-radius:50%" alt="">
                </td>
                <td >
                    <form method="POST" action="{{ route('product.destroy', $item->id) }}">
                        @csrf <!-- Bắt buộc để bảo vệ form khỏi tấn công CSRF -->
                        @method('DELETE')
                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Bạn có chắc chắn muốn xoá ?')">
                            <i class="fa fa-trash"></i> Delete</button>
                    </form>
                </td>
              </tr>
                
            @endforeach
          
        </tbody>
      </table>
    </div>
    <hr>
    {{ $data->links() }}
  </div>
@stop()