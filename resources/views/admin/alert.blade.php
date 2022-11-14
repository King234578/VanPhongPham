<!-- /resources/views/post/create.blade.php -->


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Tạo thông báo đăng nhập thất bại -->
@if (Session::has('error'))
    <div class="alert alert-danger">
            {{Session::get('error') }}
    </div>
@endif
<!-- tạo thông báo đăng nhập thành công -->
@if (Session::has('success'))
    <div class="alert alert-success">
            {{Session::get('success') }}
    </div>
@endif

