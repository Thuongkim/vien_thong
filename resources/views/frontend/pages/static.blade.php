@extends('frontend.master')

@section('title'){!! strip_tags($page[0][$lang]['title']) !!}@stop

@section('seo_keywords'){!! strip_tags($page[0][$lang]['title']) !!}@stop
@section('seo_description'){!! strip_tags($page[0][$lang]['description']) !!}@stop

@section('content')

		<div class="page-content bg-white">
			<!-- inner page banner -->
			<div class="animation-effects">
				
					<div class="dlab-bnr-inr overlay-black-middle bg-pt active wow zoomIn"
					style="background-image:url({{ asset('assets/frontend/images/main-slider/slide1.jpg') }});">
					<div class="container">
						<div class="dlab-bnr-inr-entry">
							<h1 class="text-white">{!! $page[0][$lang]['title'] !!}</h1>
							<!-- Breadcrumb row -->
							<div class="breadcrumb-row">
								<ul class="list-inline">
									<li><a href="{!! route('home') !!}">{!! trans('frontend.home') !!}</a></li>
									<li>{!! $page[0][$lang]['title'] !!}</li>
								</ul>
							</div>
							<!-- Breadcrumb row END -->
						</div>
					</div>
				
			</div>
			</div>
			<!-- inner page banner END -->
			<!-- contact area -->
			@if($slug == 'thong-tin-chung')

			<div class="content-area">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-4 col-md-4 m-b30 wow fadeInLeftBig fly-box-ho" style="visibility: visible; animation-delay: 0.6s;">
							<img src="{{ asset('assets/frontend/images/about/last.jpg') }}" alt="">
						</div>
						<div class="col-lg-8 col-md-8 m-b30">
							<!-- Title separator style 8 -->
							<div class="section-full bg-gray wow fadeInRightBig fly-box-ho" style="visibility: visible; animation-delay: 0.6s;">
								<div class="container">
									<div class="row">
										<div class="col-lg-12">
											<div class=" clearfix">
												<h4>{{trans('frontend.introduction')}}</h4>
											</div>
											<div class="dlab-separator-outer ">
												<div class="dlab-separator bg-primary style-skew"></div>
											</div>
											{!! isset($staticPages[$lang]['gioi-thieu']['description']) ? $staticPages[$lang]['gioi-thieu']['description'] : '' !!}
										</div>
										<div class="section-content"></div>
									</div>
								</div>
							</div>
							<!-- Title separator style 8 END -->
						</div>
					</div>
				</div>

				<!-- About Us End -->
				<!-- About Services info END -->
				<!-- Counter -->
				<div class="section-full content-inner abc overlay-black-dark bg-img-fix" style="background-image:url({{ asset('assets/frontend/images/main-slider/slide3.jpg') }});">
					<div class="container">
						<div class="section-content text-center text-white">
							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-6 col-6 m-b30">
									<div class="counter-style-5">
										<div class="">
											<span class="counter">1000</span>
										</div>
										<span class="counter-text">Cán bộ nhân viên</span>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-6 col-6 m-b30">
									<div class="counter-style-5">
										<div class="">
											<span class="counter">100</span>
										</div>
										<span class="counter-text">Chi nhánh khắp cả nước</span>
									</div>
								</div>
								<div class="col-lg-4 col-md-6 col-sm-6 col-6 m-b30">
									<div class="counter-style-5">
										<div class="">
											<span class="counter">1000</span>
										</div>
										<span class="counter-text">Giải thưởng xuất sắc</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
				<!-- Counter END -->
				<!-- result -->
				<div class="section-full text-center bg-gray content-inner">
					<div class="container">
						<div class="section-head text-black text-center">
							<h2 class="title">{{trans('frontend.development-history')}}</h2>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
								<div class="blog-post blog-grid blog-rounded blog-effect1 fly-box">
									<div class="dlab-post-media dlab-img-effect">
										<a href="">{!! isset($staticPages[$lang]['lich-su-phat-trien']['description']) ? $staticPages[$lang]['lich-su-phat-trien']['description'] : '' !!}</a>
									</div>
								</div>
							</div>
						</div>
						<div class="section-head text-black text-center">
							<h2 class="title">{{trans('frontend.field-of-operation')}}</h2>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.3s">
								<div class="blog-post blog-grid blog-rounded blog-effect1 fly-box">
									<div class="dlab-post-media dlab-img-effect">
										<a href="">{!! isset($staticPages[$lang]['result']['description']) ? $staticPages[$lang]['result']['description'] : '' !!}</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 m-b30 align-self-center video-infobx wow fadeInUp">
								<div class="content-bx1">
									<h2 class="m-b15 title">{{trans('frontend.business-production-results')}}</h2>
									<div class="our-story">
										{!! isset($staticPages[$lang]['story']['description']) ? $staticPages[$lang]['story']['description'] : '' !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--result end-->
				<!-- Client logo -->
				<div class="section-full content-inner-2 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
					<div class="container">
						<div class="section-head text-black text-center">
							<h2 class="title text-capitalize">{{trans('frontend.partner')}}</h2>
						</div>
						<div class="client-logo-carousel owl-loaded owl-theme owl-carousel owl-dots-none owl-btn-center-lr owl-btn-3">
							
							@foreach ($partners as $partner)

							<div class="item">
								<div class="ow-client-logo">
									<div class="client-logo border">
										<a href=""><img src="{!! asset('assets/media/images/partners/' . $partner['image']) !!}" alt=""></a>
									</div>
								</div>
							</div>
							
							@endforeach

						</div>
					</div>
				</div>
				<!-- Client logo End -->
			</div>

			@elseif($slug == 'ban-dieu-hanh')


			<div class="content-area">
				<div class="section-full bg-gray content-inner">
					<div class="container">
						<div class="animation-effects">

							<div class="row dzseth">

								<div class="col-lg-3 col-md-6 col-sm-6" style="height: 350px;margin: auto;">
										<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceIn fly-box-ho seth" data-wow-delay="0.1s" style="height: 289px; visibility: visible; animation-delay: 0.1s; animation-name: bounceIn;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g1.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Nguyễn Thế Thịnh</a></h4>
											<span class="dlab-position">Tổng Giám đốc</span>	
										</div>
									</div>
								</div>
								

							</div>

							<div class="row dzseth">
								<div class="col">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth" data-wow-delay="0.1s" style="height: 289px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g2.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Nguyễn Trường Giang</a></h4>
											<span class="dlab-position">Phó Tổng Giám đốc</span>	
										</div>
									</div>
								</div>
								<div class="col">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth" data-wow-delay="0.1s" style="height: 289px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g3.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Nguyễn Thúy Hà</a></h4>
											<span class="dlab-position">Kế toán trưởng</span>	
										</div>
									</div>
								</div>
								<div class="col">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth" data-wow-delay="0.1s" style="height: 289px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g4.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Huỳnh Trọng Trí</a></h4>
											<span class="dlab-position">Giám đốc Chi nhánh miền Nam</span>	
										</div>
									</div>
								</div>
								<div class="col">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth" data-wow-delay="0.1s" style="height: 289px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g5.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Nguyễn Thanh An</a></h4>
											<span class="dlab-position">Giám đốc Trung tâm kỹ thuật miền Bắc</span>	
										</div>
									</div>
								</div>
								<div class="col">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth" data-wow-delay="0.1s" style="height: 289px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g6.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Phạm Hưng</a></h4>
											<span class="dlab-position">Giám đốc Trung tâm kỹ thuật miền Trung</span>	
										</div>
									</div>
								</div>
							</div>


							<div class="row dzseth">

								<div class="col-6 col-md-2">
										<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth img-gd" data-wow-delay="0.1s" style="height: 100px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g7.png') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Nguyễn Quảng Bình</a></h4>
											<span class="dlab-position">Phụ trách Phòng Kinh doanh</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
										<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth img-gd" data-wow-delay="0.1s" style="height: 100px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g8.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Bùi Ngọc Hùng</a></h4>
											<span class="dlab-position">Phụ trách Phòng Kỹ thuật</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth img-gd" data-wow-delay="0.1s" style="height: 100px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g9.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Nguyễn Thị Thu </a></h4>
											<span class="dlab-position">Phụ trách phòng Quản trị nhân lực & Hành chính</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth img-gd" data-wow-delay="0.1s" style="height: 100px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g10.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Cấn Ngọc Lĩnh</a></h4>
											<span class="dlab-position">Trưởng Ban Quản lý dự án</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth img-gd" data-wow-delay="0.1s" style="height: 100px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g11.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Trần Viết Tiến</a></h4>
											<span class="dlab-position">Giám đốc Trung tâm thanh toán tiền điện tiền nhà</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInDown fly-box-ho seth img-gd" data-wow-delay="0.1s" style="height: 100px; visibility: visible; animation-delay: 0.1s; animation-name: bounceInDown;">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g12.png') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">Hoàng Văn Khoa</a></h4>
											<span class="dlab-position">Phó giám đốc trung tâm SPMS</span>	
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			@elseif($slug == 'so-do-to-chuc')

			{{-- <div class="content-area">
				<div class="container">
					<div class="col-lg-12">
						<div class="dlab-box">
							<div class="dlab-media"> 
								{!! $page[0][$lang]['description'] !!}
							</div>
						</div>
					</div>
				</div>
			</div> --}}


			<div class="content-area">
				<div class="section-full bg-gray content-inner">
					<div class="container">
						<div class="animation-effects">

							<div class="row dzseth">

								<div class="col-lg-12">
										<div class="dlab-box active wow fadeInUp" data-wow-delay="0.1s" style=" visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
										<div class="dlab-media">
											{!! $page[0][$lang]['description'] !!}
										</div>
									</div>
								</div>
								

							</div>

						</div>
					</div>
				</div>
			</div>

			@else

			<div class="content-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="jumbotron wow fadeInUp fly-box-ho seth">
								{!! $page[0][$lang]['description'] !!}
							</div>
						</div>
					</div>
				</div>
			</div>

			@endif
			<!-- contact area END -->
		</div>



@endsection
