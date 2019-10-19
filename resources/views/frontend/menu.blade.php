<header class="site-header mo-left header navstyle2">
			<!-- main header -->
			<div class="sticky-header main-bar-wraper header-curve navbar-expand-lg">
				<div class="main-bar clearfix bg-primary">
					<div class="container clearfix">
						<!-- technologysite logo -->
						<div class="logo-header mostion" style="width: auto;">
							<a href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/hte-logo.png') }}" alt=""></a>
						</div>
						<!-- nav toggle button -->
						<button class="navbar-toggler collapsed navicon justify-content-end" type="button"
							data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
							aria-expanded="false" aria-label="Toggle navigation">
							<span></span>
							<span></span>
							<span></span>
						</button>
						<!-- extra nav -->
						{{-- <div class="extra-nav">
							<div class="extra-cell">
								<button id="quik-search-btn" type="button" class="site-button-link"><i
										class="la la-search"></i></button>
							</div>
						</div> --}}
						<div class="extra-nav">
							<ul class="nav navbar-nav">
								<li>
									<a href="{!! route('change-language', ['vi']) !!}"><img src="{{ asset('assets/frontend/images/vn.png') }}" alt=""></a>
									<a href="{!! route('change-language', ['en']) !!}"><img src="{{ asset('assets/frontend/images/gb.png') }}" alt=""></a>
								</li>
							</ul>
						</div>
						<!-- Quik search -->
						<div class="dlab-quik-search bg-primary ">
							<form action="#">
								<input name="search" value="" type="text" class="form-control"
									placeholder="Type to search">
								<span id="quik-search-remove"><i class="ti-close"></i></span>
							</form>
						</div>
						<!-- main nav -->
						<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
							<div class="logo-header d-md-block d-lg-none">
								<a href="index.html"><img src="images/hte-logo.png" alt=""></a>
							</div>
							<ul class="nav navbar-nav">
								<li class="active has-mega-menu homedemo"> <a href="{{ route('home') }}">{{trans('frontend.home')}}</a>
								</li>
								<li>
									<a href="#">{{trans('frontend.present')}}<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu tab-content">
										<li>
											<a href="history.html">Lịch sử phát triển</a>
										</li>
										<li>
											<a href="about-us.html">Thông tin chung</a>
										</li>
										<li>
											<a href="vision.html">Tầm nhìn sứ mệnh giá trị cốt lõi </a>
										</li>
										<li>
											<a href="quality-policy.html">Chính sách chất lượng</a>
										</li>
										<li>
											<a href="executive-board.html">Bạn điều hành</a>
										</li>
										<li>
											<a href="organizational-chart.html">Sơ đồ tổ chức</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">{{trans('frontend.service')}}<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu tab-content">
										<li>
											<a href="javascript:void(0);">Viễn thông <i
													class="fa fa-angle-right"></i></a>
											<ul class="sub-menu">
												<li><a href="services-details.html">Khảo sát thiết kế </a></li>
												<li><a href="services-details.html">Xây dựng nhà trạm</a></li>
												<li><a href="services-details.html">Lắp đặt thiết bị</a></li>
												<li><a href="services-details.html">Tối ưu hóa</a></li>
												<li><a href="services-details.html">Vận hành mạng</a></li>
											</ul>
										</li>
										<li>
											<a href="javascript:void(0);">Tin học <i class="fa fa-angle-right"></i></a>
											<ul class="sub-menu">
												<li><a href="services-details.html">Dịch vụ tin học</a></li>
												<li><a href="services-details.html">Dịch vụ tin học</a></li>
												<li><a href="services-details.html">Dịch vụ tin học</a></li>
												<li><a href="services-details.html">Dịch vụ tin học</a></li>
												<li><a href="services-details.html">Dịch vụ tin học</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="has-mega-menu"> <a href="{{ route('project') }}">{{trans('frontend.project')}}<i
											class="fa fa-chevron-down"></i></a>
									<ul class="mega-menu">
										@foreach ($projectCategories as $projectCategory)
										<li>
											<a href="javascript:void(0);">{{trans('frontend.project')}} {{ $projectCategory[$lang]['name']}}</a>
											<ul>
												@php
													$i = 0;	
												@endphp
												@foreach ($projects as $project)
												@if ($projectCategory['id'] == $project['category_id'] && $project[$lang]['title'])
												<li><a href="{{ route('project.show', $project['id']) }}">{{$project[$lang]['title']}}</a></li>
												@php
													$i++;
													if ($i > 5) break;
												@endphp
												@endif
												@endforeach
											</ul>
										</li>
										@endforeach
									</ul>
								</li>
								<li class="has-mega-menu"> <a href="{{ route('news') }}">{{trans('frontend.news')}}</a>
								</li>
								<li class="has-mega-menu"> <a href="{{ route('career') }}">{{trans('frontend.career')}}</a>
								</li>
								<li class="has-mega-menu"> <a href="{{ route('partner') }}">{{trans('frontend.partner')}}</a>
								</li>
								<li class="has-mega-menu"> <a href="https://mail.hte.vn">Mail</a>
								</li>
							</ul>
						</div>
						<!--main nav end-->
					</div>
				</div>
			</div>
			<!-- main header END -->
		</header>