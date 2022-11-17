@extends('admin.main')

@section('content')
    <table class='table'>
        <thead>
            <th style="width:1px">ID</th>
            <th>ID khách hàng</th>
            <th>ID sản phẩm</th>
            <th>Ngày order</th>
            <th>Tổng tiền</th>
            <th>Cách thức trả</th>
            <th>Ghi chú</th>

            <th style="width: 50px;">&nbsp</th>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menub($menu) !!}
        </tbody>
    </table>
@endsection

