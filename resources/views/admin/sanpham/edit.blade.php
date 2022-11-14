@extends('admin.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input type="text"  name="TenSP" value="{{$MaSP->TenSP}}" class="form-control"  placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label for="menu">Danh mục</label>
                <select class="form-control" name="parent_id" >
                    <option value="0">Danh mục cha</option>
                    @foreach($danhmucsanpham as $menu)
                        <option value="{{$menu->MaDanhMuc}}">{{ $menu->TenDanhMuc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="menu">Mô tả</label>
                <textarea name="MotaSP" class="form-control" >{{$MaSP->MotaSP}}</textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="MaNCC"  class="form-control" >{{$MaSP->MaNCC}}</textarea>
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
                          <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                          <label for="no_active" class="custom-control-label">Không</label>
                        </div>

                      </div>
                    </div>
            </div>
        </div>

                <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
            <script>
                CKEDITOR.replace('content');
            </script>
@endsection
