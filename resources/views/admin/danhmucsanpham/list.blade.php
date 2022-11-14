@extends('admin.main')

@section('content')
    <table class='table'>
        <thead>
            <th style="width:150px">ID</th>
            <th>Tên Sản Phẩm</th>

            <th style="width: 100px;">&nbsp</th>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::DanhMuc($menu) !!}
        </tbody>
    </table>
@endsection

