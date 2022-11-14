@extends('admin.main')

@section('content')
    <table class='table'>
        <thead>
            <th style="width:10px">ID</th>
            <th>Tên Nhà cung cấp</th>
            <th>Địa chỉ </th>
            <th>Email </th>
            <th>Số điện thoại</th>
            <th style="width: 100px;">&nbsp</th>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::NhaCungCap($menu) !!}
        </tbody>
    </table>
@endsection

