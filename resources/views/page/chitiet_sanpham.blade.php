@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$chitiet_sp->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trangchu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						@if($chitiet_sp->promotion_price != 0)
							<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
						@endif
						<div class="col-sm-4">
							<img src="source/image/product/{{$chitiet_sp->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$chitiet_sp->name}}</p>
								<p class="single-item-price">
									@if($chitiet_sp->promotion_price == 0)
										<span class="flash-sale">{{number_format($chitiet_sp->unit_price)}} VNĐ</span>
										@else
										<span class="flash-del">{{number_format($chitiet_sp->unit_price)}} VNĐ</span>
										<span class="flash-sale">{{number_format($chitiet_sp->promotion_price)}} VNĐ</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$chitiet_sp->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng</p>
							<div class="single-item-options">
								<!-- <select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select> -->
								<!-- <select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select> -->
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="{{route('themgiohang', $chitiet_sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<!-- <li><a href="#tab-reviews">Reviews (0)</a></li> -->
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$chitiet_sp->description}}</p>
							
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
							@foreach($sanpham_tuongtu as $sptt)
								<div class="col-sm-4">
									<div class="single-item">
										@if($sptt->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsanpham', $sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="220px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sptt->name}}</p>
											<p class="single-item-price">
												@if($sptt->promotion_price == 0)
													<span class="flash-sale">{{number_format($sptt->unit_price)}} VNĐ</span>
												@else
													<span class="flash-del">{{number_format($sptt->unit_price)}} VNĐ</span>
													<span class="flash-sale">{{number_format($sptt->promotion_price)}} VNĐ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang', $sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham', $sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
						</div>
						<div class="row" style="text-align: center;">{{$sanpham_tuongtu->links("pagination::bootstrap-4")}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm bán chạy</h3>
						<div class="widget-body">
							@foreach($sanpham_banchay as $banchay)
								<div class="beta-sales beta-lists">
									<div class="media beta-sales-item">
										<a class="pull-left" href="{{route('chitietsanpham', $banchay->id)}}"><img src="source/image/product/{{$banchay->image}}" alt=""></a>
										<div class="media-body">
											<p>{{$banchay->name}}</p>
											@if($banchay->promotion_price == 0)
												<span class="flash-sale">{{number_format($banchay->unit_price)}} VNĐ</span>
											@else
												<span class="flash-sale">{{number_format($banchay->promotion_price)}} VNĐ</span>
											@endif
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
						@foreach($new_product_1 as $new_Pro)
							<div class="beta-sales beta-lists">
									<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham', $new_Pro->id)}}"><img src="source/image/product/{{$new_Pro->image}}" alt=""></a>
									<div class="media-body">
										<p>{{$new_Pro->name}}</p>
										@if($new_Pro->promotion_price == 0)
											<span class="flash-sale">{{number_format($new_Pro->unit_price)}} VNĐ</span>
										@else
											<!-- <span class="flash-del">{{number_format($sptt->unit_price)}} VNĐ</span> -->
											<span class="flash-sale">{{number_format($new_Pro->promotion_price)}} VNĐ</span>
										@endif
									</div>
								</div>
							</div>
						@endforeach	
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
  @endsection