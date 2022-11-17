@extends('admin.main')

@section('content')
    <table class='table'>
        <thead>
            <th style="width:1px">ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Mô tả</th>
            <th>Giá cũ</th>
            <th>Giá mới</th>
            <th>Edit hoặc xóa</th>
            <th style="width: 50px;">&nbsp</th>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menu) !!}
        </tbody>
    </table>
@endsection

