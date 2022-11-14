@extends('admin.main')

@section('content')
    <table class='table'>
        <thead>
            <th style="width:10px">ID</th>
            <th>Tên Sản Phẩm</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Trạng thái</th>
            <th>Số Lượng</th>

            <th style="width: 100px;">&nbsp</th>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::SanPham($menu) !!}
        </tbody>
    </table>
@endsection

