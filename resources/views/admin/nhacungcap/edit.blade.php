@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
             <div class="form-group">
                <label for="menu">Tên Nhà cung cấp</label>
                <input name="TenNCC" value="{{$MaNCC->TenNCC}}"  class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="menu">Địa chỉ</label>
                <input type="text" name="DiaChi_NCC" value="{{$MaNCC->DiaChi_NCC}}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="menu">Số điện thoại</label>
                <input type="text" name="SoDT_NCC" value="{{$MaNCC->SoDT_NCC}}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="menu">Địa chỉ</label>
                <input type="text" name="Email_NCC" value="{{$MaNCC->Email_NCC}}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>





        </div>

                <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Sửa danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
            <script>
                CKEDITOR.replace('content');
            </script>
@endsection
