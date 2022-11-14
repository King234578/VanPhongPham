@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
             <div class="form-group">
                <label for="menu">Mã Danh Mục</label>
                <input type="text" name="MaDanhMuc" value="{{$MaDanhMuc->MaDanhMuc}}"  class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input type="text" name="TenDanhMuc" value="{{$MaDanhMuc->TenDanhMuc}}" class="form-control"  placeholder="Nhập tên danh mục">
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
