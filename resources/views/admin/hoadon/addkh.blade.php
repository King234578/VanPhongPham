@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')

    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Sản Phẩm</label>
                <input type="text" name="TenSP" class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="menu">Danh mục</label>
                <select class="form-control" name="parent_id" >
                    <option value="0">Danh mục cha</option>

                </select>
            </div>
            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="MotaSP" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label for="menu">Số Lượng</label>
                <input type="number" name="SoLuong" id="SoLuong" min="1" max="999999999" class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="SoLuong">Giảm giá</label>
                <input type="number" name="GiamGia" id="GiamGia" min="1" max="999999999" class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="menu">Số Lượng</label>
                <input type="file" name="AnhSP" id="AnhSP" required />
            </div>
            <div class="form-group">
                <label for="menu">Sản phẩm bán chạy</label>
                <input name="SPBanChay" class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="menu">Mã nhà cung cấp</label>
                <input name="MaNCC" class="form-control" ></input>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                        <!-- radio -->
                        <div class="form-group">
                            <label for="">Kích hoạt</label>
                            <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="1" id="active" name="active" checked="">
                            <label for="active" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" value="0" id="no_active" name="active" >
                            <label for="no_active" class="custom-control-label">Không</label>
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
