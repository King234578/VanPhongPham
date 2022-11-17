@extends('admin.main')

@section('content')
    <table class='table'>
        <thead>
            <th style="width:1px">ID</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Edit hoặc xóa</th>
            <th style="width: 50px;">&nbsp</th>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menuc($menu) !!}
        </tbody>
    </table>
@endsection

