@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$ten_loai_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Loại sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai_sp_left_menu as $tenloai)
								<li><a href="{{route('loaisanpham', $tenloai->id)}}">{{$tenloai->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm {{$ten_loai_sp->name}}</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $loaisp)
									<div class="col-sm-4">
										<div class="single-item">
											@if($loaisp->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="{{route('chitietsanpham', $loaisp->id)}}"><img src="source/image/product/{{$loaisp->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$loaisp->name}}</p>
												<p class="single-item-price">
													@if($loaisp->promotion_price == 0)
														<span class="flash-sale">{{number_format($loaisp->unit_price)}} VNĐ</span>
													@else
														<span class="flash-del">{{number_format($loaisp->unit_price)}} VNĐ</span>
														<span class="flash-sale">{{number_format($loaisp->promotion_price)}} VNĐ</span>
													@endif
												</p>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('themgiohang', $loaisp->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chitietsanpham', $loaisp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_khac as $spkhac)
									<div class="col-sm-4">
										<div class="single-item">
											@if($spkhac->promotion_price != 0)
												<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
											@endif
											<div class="single-item-header">
												<a href="{{route('chitietsanpham', $spkhac->id)}}"><img src="source/image/product/{{$spkhac->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$spkhac->name}}</p>
												<p class="single-item-price">
													@if($spkhac->promotion_price == 0)
														<span class="flash-sale">{{number_format($spkhac->unit_price)}} VNĐ</span>
													@else
														<span class="flash-del">{{number_format($spkhac->unit_price)}} VNĐ</span>
														<span class="flash-sale">{{number_format($spkhac->promotion_price)}} VNĐ</span>
													@endif
												</p>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('themgiohang', $spkhac->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="{{route('chitietsanpham', $spkhac->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
							<div class="row" style="text-align: center;">{{$sp_khac->links("pagination::bootstrap-4")}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
  @endsection