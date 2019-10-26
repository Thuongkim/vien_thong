@extends('frontend.master')

@section('title'){!! strip_tags($page[0][$lang]['title']) !!}@stop

@section('seo_keywords'){!! strip_tags($page[0][$lang]['title']) !!}@stop
@section('seo_description'){!! strip_tags($page[0][$lang]['description']) !!}@stop

@section('content')

		<div class="page-content bg-white">
			<!-- inner page banner -->
			<div class="dlab-bnr-inr overlay-black-middle bg-pt"
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
			<!-- inner page banner END -->
			<!-- contact area -->
			@if($slug == 'thong-tin-chung')

			<div class="content-area">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-4 col-md-4 m-b30">
							<img src="{{ asset('assets/frontend/images/about/last.jpg') }}" alt="">
						</div>
						<div class="col-lg-8 col-md-8 m-b30">
							<!-- Title separator style 8 -->
							<div class="section-full bg-gray">
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
				<div class="section-full content-inner overlay-black-dark bg-img-fix" style="background-image:url({{ asset('assets/frontend/images/main-slider/slide3.jpg') }});">
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
							<h2 class="title">{{trans('frontend.business-production-results')}}</h2>
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
							<div class="col-lg-12 col-md-12 m-b30 align-self-center video-infobx">
								<div class="content-bx1">
									<h2 class="m-b15 title">{{trans('frontend.field-of-operation')}}</h2>
									<div class="our-story">
										
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

			@else

			<div class="content-area">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12 col-md-12 m-b30">
							<div class="our-story jumbotron">
									
								
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
