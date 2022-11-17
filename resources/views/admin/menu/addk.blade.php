@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')

    <form action="" enctype="multipart/form-data" method="POST" >
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên khách hàng</label>
                <input type="text" name="name"  class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="menu">Email</label>
                <textarea name="email" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label for="menu">Địa chỉ</label>
                <input type="text" name="address"  class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="SoLuong">Số điện thoại</label>
                <input type="text" name="phone_number" class="form-control" ></input>
            </div>

            <div class="form-group">
                <label for="menu">Ghi chú</label>
                <input name="note" class="form-control" ></input>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                        <!-- radio -->
                        <div class="form-group">
                            <label for="">Kích hoạt</label>
                            <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="1" id="active" name="gender" checked="">
                            <label for="active" class="custom-control-label">Name</label>
                            </div>
                            <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="0" id="no_active" name="gender" >
                            <label for="no_active" class="custom-control-label">Nữ</label>
                            </div>

                        </div>
                </div>
            </div>
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
