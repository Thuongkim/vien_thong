<header class="site-header mo-left header navstyle2">
			<!-- main header -->
			<div class="sticky-header main-bar-wraper header-curve navbar-expand-lg">
				<div class="main-bar clearfix bg-primary">
					<div class="container clearfix">
						<!-- technologysite logo -->
						<div class="logo-header mostion" style="width: auto;">
							<a href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/hte-logo.jpg') }}" alt="" style="width: 258px; height: 75px"></a>
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
								<li><a href="{!! route('change-language', ['vi']) !!}"><img src="{{ asset('assets/frontend/images/vn.png') }}" alt=""></a><a href="{!! route('change-language', ['en']) !!}"><img src="{{ asset('assets/frontend/images/gb.png') }}" alt=""></a></li>
							</ul>
						</div>
						<!-- Quik search -->
						{{-- <div class="dlab-quik-search bg-primary ">
							<form action="{{ route('home.search') }}" method="GET">
								<input name="keyword" value="" type="text" class="form-control"
									placeholder="Tìm kiếm">
								<span id="quik-search-remove"><i class="ti-close"></i></span>
							</form>
						</div> --}}
						<!-- main nav -->
						<div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
							<div class="logo-header d-md-block d-lg-none">
								<a href="index.html"><img src="images/hte-logo.png" alt=""></a>
							</div>
							<ul class="nav navbar-nav">
								<li class="active has-mega-menu homedemo"> <a href="{{ route('home') }}">Trang chủ</a>
								</li>
								<li>
									<a href="">Giới thiệu<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu tab-content">

										@foreach($staticPagess as $staticPage)
										<li>
											<a href="{!! route('home.static-page', $staticPage['slug']) !!}">{{ $staticPage[$lang]['title'] }}</a>
											{{-- @dd($staticPage) --}}
										</li>
										@endforeach
									</ul>
								</li>
								<li>
									<a href="#">Dịch vụ<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu tab-content">
										@foreach($servicesCategories as $servicesCategory)
										@if (count($servicesCategory['children']))
										<li>
											<a href="{!! route('home.services-category', ['slug' => str_slug($servicesCategory['name']), 'id' => $servicesCategory['id']]) !!}" title="{!! $servicesCategory['name'] !!}">{{ $servicesCategory['name'] }} <i
													class="fa fa-angle-right"></i></a>
											<ul class="sub-menu">
												@foreach($servicesCategory['children'] as $child)

												<li>
													<a href="{!! route('home.services-category', ['slug' => str_slug($child['name']), 'id' => $child['id']]) !!}">{!! $child['name'] !!} </a>
												</li>
												
												@endforeach
											</ul>
										</li>
										@else
										<li>
											<a href="{!! route('home.services-category', ['slug' => str_slug($servicesCategory['name']), 'id' => $servicesCategory['id']]) !!}">{!! $servicesCategory['name'] !!}</a>

										</li>
										@endif
										@endforeach
									</ul>
								</li>
								<li class="has-mega-menu"> <a href="#">Dự án<i
											class="fa fa-chevron-down"></i></a>
									<ul class="mega-menu">
										<li>
											<a href="javascript:void(0);">Tin học</a>
											<ul>
												<li><a href="project-details.html">Dự án lắp đặt Metro IP Core</a></li>
												<li><a href="project-details.html">Dự án di dời nhà trạm</a></li>
												<li><a href="project-details.html">Dự án triển khai xây dựng hạ tầng mạng
														Viễn thông</a></li>
												<li><a href="project-details.html">Dự án vận hành và ứng cứu máy nổ cố
														định</a></li>
												<li><a href="project-details.html">Dự án vận hành và ứng cứu thông tin
														mạng Viễn thông cho Huawei</a></li>
											</ul>
										</li>
										<li>
											<a href="javascript:void(0);">Dự án viễn thông</a>
											<ul>
												<li><a href="project-details.html">Dự án vận hành Mobile Genset cho mạng
														Vietnamobile</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="has-mega-menu"> <a href="{{ route('news') }}">Tin tức</a>
								</li>
								<li class="has-mega-menu"> <a href="recruitment.html">Tuyển dụng</a>
								</li>
								<li class="has-mega-menu"> <a href="partner.html">Đối tác</a>
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
