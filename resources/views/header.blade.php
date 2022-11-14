<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i>273 An Dương Vương, P.2, Q.5, TP.HCM</a></li>
						<li><a href=""><i class="fa fa-phone"></i>0903760949</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<!-- <li><a href="#"><i class="fa fa-user"></i>Tài khoản</a></li> -->
						@if(Auth::check())
							<li><a href="{{route('trangchu')}}">Chào bạn, {{Auth::user()->full_name}}</a></li>
							<li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
						@else
							<li><a href="{{route('dangky')}}">Đăng kí</a></li>
							<li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img style="max-width:50%;" src="source/assets/dest/images/logo_abc_bakery.png" width="250px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}} @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">

								@foreach($product_cart as $product_picked)
									<div class="cart-item">
										<a class="cart-item-delete" href="{{route('xoagiohang', $product_picked['item']['id'])}}"><i class="fa fa-times"></i></a>
										<div class="media">
											<a class="pull-left" href="#"><img src="source/image/product/{{$product_picked['item']['image']}}" alt=""></a>
											<div class="media-body">
												<span class="cart-item-title">{{$product_picked['item']['name']}}</span>
												<!-- <span class="cart-item-options">Size: XS; Colar: Navy</span> -->
												<span class="cart-item-amount">{{$product_picked['qty']}}*<span>@if($product_picked['item']['promotion_price'] == 0) {{number_format($product_picked['item']['unit_price'])}} @else {{number_format($product_picked['item']['promotion_price'])}} @endif</span></span>
											</div>
										</div>
									</div>
								@endforeach


								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} VNĐ</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
						@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="{{route('loaisanpham', 1)}}">Loại sản phẩm</a>
							<ul class="sub-menu">
								@foreach($truyen_loai_sp as $loai)
								<li><a href="{{route('loaisanpham', $loai->id)}}">{{$loai->name}}</a></li>
								@endforeach
							</ul>
						</li>
						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->
