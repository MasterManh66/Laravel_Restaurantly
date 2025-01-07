@extends('site.master')
@section('title', '404 - ERROR ')
@section('style')
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .error-container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .error-container h1 {
            font-size: 120px;
            margin: 0;
            color: #ff6b6b;
        }
        .error-container h2 {
            font-size: 24px;
            margin: 10px 0;
            color: #333;
        }
        .error-container p {
            color: #666;
            font-size: 16px;
        }
        .error-container a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background: #ff6b6b;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        .error-container a:hover {
            background: #ff4a4a;
        }
    </style>
@stop()
@section('content')
    <div class="error-container">
        <h1>404</h1>
        <h2>Không tìm thấy trang</h2>
        <p>Xin lỗi, trang bạn đang tìm kiếm không tồn tại hoặc đã bị xóa.</p>
        <a href="{{ route('index') }}">Quay lại trang chủ</a>
    </div>
@stop()
