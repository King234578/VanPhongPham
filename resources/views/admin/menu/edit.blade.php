@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
        <div class="form-group">
                <label for="menu">ID : {{$id->id}}</label>
            </div>
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input type="text"  name="name" value="{{$id->name}}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <!-- <div class="form-group">
                <label for="menu">Danh mục</label>
                <select class="form-control" name="description" >
                    <option value="0">Danh mục cha</option>
                    <!--  -->
                </select>
            <!-- </div> -->
            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea type="text" name="description"  class="form-control" >{{$id->description}} </textarea>
            </div>
            <div class="form-group">
                <label for="menu">Ảnh</label>
                <input type="file" name="image"  class="form-control" value="{{$id->image}}"> </input>
            </div>
            <div class="form-group">
                <label for="menu">Giá cũ</label>
                <textarea type="text" name="unit_price"  class="form-control" >{{$id->unit_price}} </textarea>
            </div>
            <div class="form-group">
                <label for="menu">Giá mới</label>
                <textarea type="text" name="promotion_price"  class="form-control" >{{$id->promotion_price}} </textarea>
            </div>

        </div>

                <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
            <script>
                CKEDITOR.replace('content');
            </script>
@endsection
