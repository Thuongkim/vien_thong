@extends('frontend.master')

@section('title'){!! strip_tags($page[0][$lang]['title']) !!}@stop

@section('seo_keywords'){!! strip_tags($page[0][$lang]['title']) !!}@stop
@section('seo_description'){!! strip_tags($page[0][$lang]['description']) !!}@stop

@section('content')

		<div class="page-content bg-white">
			<!-- inner page banner -->
			<div class="animation-effects">
				
					<div class="dlab-bnr-inr overlay-black-middle bg-pt active wow zoomIn" data-wow-duration="2s" style="background-image:url({{ asset('assets/frontend/images/main-slider/abc.png') }});">
					<div class="container">
						<div class="dlab-bnr-inr-entry">
							<h1 class="text-white" style="text-transform: uppercase;">{!! $page[0][$lang]['title'] !!}</h1>
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
						<div class="col-lg-4 col-md-4 m-b30 wow fadeInLeftBig" data-wow-duration="2s">
							<img src="{{ asset('assets/frontend/images/hte-logo.png') }}" alt="">
						</div>
						<div class="col-lg-8 col-md-8 m-b30">
							<!-- Title separator style 8 -->
							<div class="section-full bg-gray wow zoomIn fly-box-ho" data-wow-duration="3s">
								<div class="container">
									<div class="row">
										<div class="col-lg-12" style="background: #ffffff">
											<div class=" clearfix">
												<h4 style="text-transform: uppercase;">{{trans('frontend.introduction')}}</h4>
											</div>
											<div class="dlab-separator-outer ">
												<div class="dlab-separator bg-primary style-skew"></div>
											</div>
											<h4 class="dlab-title">{!! isset($staticPages[$lang]['gioi-thieu']['description']) ? $staticPages[$lang]['gioi-thieu']['description'] : '' !!}</h4>
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
				<div class="section-full content-inner abc overlay-black-dark bg-img-fix wow zoomIn" data-wow-duration="3s" style="background-image:url({{ asset('assets/frontend/images/main-slider/slide3.jpg') }});">
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
						<div class="section-head text-black text-center wow zoomIn" data-wow-duration="3s">
							<h2 class="m-b15 title" style="text-transform: uppercase;">{{trans('frontend.development-history')}}</h2>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 wow zoomIn" data-wow-duration="3s">
								<div class="blog-post blog-grid blog-rounded blog-effect1 fly-box">
									<div class="dlab-post-media dlab-img-effect">
										<a href="">{!! isset($staticPages[$lang]['lich-su-phat-trien']['description']) ? $staticPages[$lang]['lich-su-phat-trien']['description'] : '' !!}</a>
									</div>
								</div>
							</div>
						</div>
						<div class="section-head text-black text-center wow zoomIn" data-wow-duration="3s">
							<h2 class="m-b15 title" style="text-transform: uppercase;">{{trans('frontend.field-of-operation')}}</h2>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 wow zoomIn" data-wow-duration="3s">
								<div class="blog-post blog-grid blog-rounded blog-effect1 fly-box">
									<div class="dlab-post-media dlab-img-effect">
										<a href="">{!! isset($staticPages[$lang]['result']['description']) ? $staticPages[$lang]['result']['description'] : '' !!}</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 m-b30 align-self-center video-infobx wow zoomIn" data-wow-duration="2s">
								<div class="content-bx1">
									<h2 class="m-b15 title" style="text-transform: uppercase;">{{trans('frontend.business-production-results')}}</h2>
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
				{{-- <div class="section-full content-inner-2 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
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
				</div> --}}
				<!-- Client logo End -->
			</div>

			@elseif($slug == 'ban-dieu-hanh')

			{!! $staticPagess[2][$lang]['description'] ? $staticPagess[2][$lang]['description'] : ''!!}

			{{-- <div class="content-area">
				<div class="section-full bg-gray content-inner">
					<div class="container">
						<div class="animation-effects">

							<div class="row dzseth">
								<div class="col-lg-3 col-md-6 col-sm-6" style="height: 350px;margin: auto;">
										<div class="dlab-box-bg m-b30 dlab-team1 active wow zoomIn fly-box-ho seth" data-wow-duration="2s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g1.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">{{trans('gd.g1')}}</a></h4>
											<span class="dlab-position">{{trans('gd.cg1')}}</span>	
										</div>
									</div>
								</div>
							</div>

							<div class="row dzseth">
								<div class="col-xl-2dot4">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img src="{{ asset('assets/frontend/images/our-team/g2.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title" style="margin-left: -15px;max-width: 1000px; min-width: 180px"><a href="javascript:;">{{trans('gd.g2')}}</a></h4>
											<span class="dlab-position">{{trans('gd.cg2')}}</span>	
										</div>
									</div>
								</div>
								<div class="col-xl-2dot4">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img src="{{ asset('assets/frontend/images/our-team/g3.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">{{trans('gd.g3')}}</a></h4>
											<span class="dlab-position">{{trans('gd.cg3')}}</span>	
										</div>
									</div>
								</div>
								<div class="col-xl-2dot4">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img src="{{ asset('assets/frontend/images/our-team/g5.png') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">{{trans('gd.g5')}}</a></h4>
											<span class="dlab-position">{{trans('gd.gd')}}<br>{{trans('gd.cg5')}}<br>{{trans('gd.mb')}}</span>	
										</div>
									</div>
								</div>
								<div class="col-xl-2dot4">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img src="{{ asset('assets/frontend/images/our-team/g6.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">{{trans('gd.g6')}}</a></h4>
											<span class="dlab-position">{{trans('gd.gd')}}<br>{{trans('gd.cg6')}}<br>{{trans('gd.mt')}}</span>	
										</div>
									</div>
								</div>
								<div class="col-xl-2dot4">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img src="{{ asset('assets/frontend/images/our-team/g4.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title"><a href="javascript:;">{{trans('gd.g4')}}</a></h4>
											<span class="dlab-position">{{trans('gd.gd')}}<br>{{trans('gd.cg4')}}</span>	
										</div>
									</div>
								</div>
							</div>
							
							<div class="row dzseth">

								<div class="col-6 col-md-2">
										<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth img-gd" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g7.png') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title" style="margin-left: -45px;width: 200px;"><a href="javascript:;">{{trans('gd.g7')}}</a></h4>
											<span class="dlab-position">{{trans('gd.pt')}}<br>{{trans('gd.cg7')}}</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
										<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth img-gd" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g8.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title" style="margin-left: -45px;width: 200px;"><a href="javascript:;">{{trans('gd.g8')}}</a></h4>
											<span class="dlab-position">{{trans('gd.pt')}}<br>{{trans('gd.cg8')}}</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth img-gd" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g9.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title" style="margin-left: -45px;width: 200px;"><a href="javascript:;">{{trans('gd.g9')}}</a></h4>
											<span class="dlab-position">{{trans('gd.pt')}}<br>{{trans('gd.cg9')}}</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth img-gd" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g10.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title" style="margin-left: -45px;width: 200px;"><a href="javascript:;">{{trans('gd.g10')}}</a></h4>
											<span class="dlab-position">{{trans('gd.cg10')}}</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth img-gd" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g11.jpg') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title" style="margin-left: -45px;width: 200px;"><a href="javascript:;">{{trans('gd.g11')}}</a></h4>
											<span class="dlab-position">{{trans('gd.gd')}}<br>{{trans('gd.cg11')}}</span>	
										</div>
									</div>
								</div>
								<div class="col-6 col-md-2">
									<div class="dlab-box-bg m-b30 dlab-team1 active wow bounceInUp fly-box-ho seth img-gd" data-wow-duration="2.5s">
										<div class="dlab-media">
											<a href="javascript:;">
												<img width="358" height="460" alt="" src="{{ asset('assets/frontend/images/our-team/g12.png') }}">
											</a>
										</div>
										<div class="dlab-info">
											<h4 class="dlab-title" style="margin-left: -45px;width: 200px;"><a href="javascript:;">{{trans('gd.g12')}}</a></h4>
											<span class="dlab-position">{{trans('gd.gd')}}<br>{{trans('gd.cg12')}}</span>	
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div> --}}

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
			{!! $staticPagess[1][$lang]['description'] ? $staticPagess[1][$lang]['description'] : ''!!}
			{{-- <div class="content-area">
				<div class="container">
					<div class="row">
						<div class="col-sm wow zoomIn">
							<div class="dlab-box m-b30 dlab-team4">
								<div class="dlab-media">
									<a href="javascript:;">
										<img src="{{ asset('assets/frontend/images/tn/tn1.png') }}">
									</a>
								</div>
								<div class="dlab-info">
									<h4 class="dlab-title"><a href="javascript:;">TẦM NHÌN HTE</a></h4>
									<span class="dlab-position">HTE mong muốn trở thành một công ty có mô hình tổ chức hiện đại, không ngừng nâng cao giá trị thương hiệu và phát triển bền vững của công ty bằng nỗ lực sáng tạo và lao động của từng nhân viên, đầu tư không ngừng vào nền tảng tiềm lực và công nghệ; tối ưu chi phí của khách hàng, tạo điều kiện phát huy tốt nhất tiềm năng của từng thành viên và tạo nên các giá trị dài hạn cho các cổ đông.</span>
									
								</div>
							</div>
						</div>
						<div class="col-sm wow zoomIn">
							<div class="dlab-box m-b30 dlab-team4">
								<div class="dlab-media">
									<a href="javascript:;">
										<img src="{{ asset('assets/frontend/images/tn/tn2.png') }}">
									</a>
								</div>
								<div class="dlab-info">
									<h4 class="dlab-title"><a href="javascript:;">SỨ MỆNH HTE</a></h4>
									<span class="dlab-position">Trở thành công ty hàng đầu có khả năng cung cấp trọn gói các dịch vụ kỹ thuật từ khảo sát thiết kế cho đến quản lý vận hành mạng lưới viễn thông và CNTT trên toàn bộ lãnh thổ Việt nam <br> Trở thành công ty hàng đầu tại Việt nam có khả năng cung cấp các giải pháp tích hợp viễn thông – tin học – truyền thông nhằm cung cấp các dịch vụ tiện ích cho các cá nhân, gia đình và tổ chức trong xã hội.</span>
									
								</div>
							</div>
						</div>
						<div class="col-sm wow zoomIn">
							<div class="dlab-box m-b30 dlab-team4">
								<div class="dlab-media">
									<a href="javascript:;">
										<img src="{{ asset('assets/frontend/images/tn/tn3.png') }}">
									</a>
								</div>
								<div class="dlab-info">
									<h4 class="dlab-title"><a href="javascript:;">GIÁ TRỊ CỐT LÕI HTE</a></h4>
									<span class="dlab-position">1. Khách hàng là trung tâm, đối tác là đồng hành:Luôn tập trung vào chất lượng sản phẩm dịch vụ để đem đến lợi ích cao nhất cho khách hàng. Đồng thời luôn coi đối tác, nhà cung cấp là người bạn đồng hành xuyên suốt trên chặng đường phát triển của Công ty để cùng chia sẻ lợi ích, cùng hợp tác thành công.
										<br>
										2. Sáng tạo: Luôn năng động, sáng tạo nhằm thích nghi với sự thay đổi của thị trường; tạo sự khác biệt, đa dạng hóa dịch vụ để đáp ứng nhu cầu của khách hàng.
										<br>
										3. Tin cậy: Đội ngũ cán bộ đáng tin cậy, làm việc trên nguyên tắc tôn trọng lẫn nhau gắn với trách nhiệm của từng cá nhân.</span>
									
								</div>
							</div>
						</div>
					

					</div>
				</div>
			</div> --}}

			@endif
			<!-- contact area END -->
		</div>



@endsection
