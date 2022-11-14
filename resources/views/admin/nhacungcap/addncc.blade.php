@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')

    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Nhà cung cấp</label>
                <input type="text" name="TenNCC" class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="menu">Địa chỉ</label>
                <textarea name="DiaChi_NCC" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label for="menu">Số điện thoại</label>
                <input type="number" name="SoDT_NCC" class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="menu">Email</label>
                <input type="text" name="Email_NCC"  class="form-control" ></input>
            </div>


        </div>

                <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
            <script>
                CKEDITOR.replace('content');
            </script>
@endsection
