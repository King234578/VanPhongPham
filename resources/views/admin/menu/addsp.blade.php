@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')

    <form action="" enctype="multipart/form-data" method="POST" >
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Sản Phẩm</label>
                <input type="text" name="name"  class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <!-- <div class="form-group">
                <label for="menu">Danh mục</label>
                <select class="form-control" name="parent_id" >
                    <option value="0">Danh mục cha</option>

                </select>
            </div> -->
            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="description" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <label for="menu">Giá hiện tại</label>
                <input type="number" name="unit_price"  class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="SoLuong">Giá giảm còn </label>
                <input type="number" name="promotion_price" class="form-control" ></input>
            </div>

            <div class="form-group">
                <label for="menu">Sản phẩm bán chạy</label>
                <input name="image" class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="menu">hộp hoặc cái</label>
                <input name="unit" class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="menu">1 hoặc 0</label>
                <input name="new" class="form-control" ></input>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh</label>
                <input type="file" name="image"  class="form-control" > </input>
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
