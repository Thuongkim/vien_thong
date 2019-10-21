<header class="site-header mo-left header navstyle2">
			<!-- main header -->
			<div class="sticky-header main-bar-wraper header-curve navbar-expand-lg">
				<div class="main-bar clearfix bg-primary">
					<div class="container clearfix">
						<!-- technologysite logo -->
						<div class="logo-header mostion" style="width: auto;">
							<a href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/hte-logo.png') }}" alt="" style="width: 258px; height: 75px"></a>
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
								<a href="index.html"><img src="{{ asset('assets/frontend/images/hte-logo.jpg') }}" alt=""></a>
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
								<li class="has-mega-menu"> <a href="{{ route('project') }}">Dự án<i
											class="fa fa-chevron-down"></i></a>
									<ul class="mega-menu">
										@foreach ($projectCategories as $projectCategory)
										<li>
											<a href="javascript:void(0);">Dự án {{ $projectCategory[$lang]['name']}}</a>
											<ul>
												@php
													$i = 0;	
												@endphp
												@foreach ($projects as $project)
												@if ($projectCategory['id'] == $project['category_id'])
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
								<li class="has-mega-menu"> <a href="{{ route('news') }}">Tin tức</a>
								</li>
								<li class="has-mega-menu"> <a href="{{ route('career') }}">Tuyển dụng</a>
								</li>
								<li class="has-mega-menu"> <a href="{{ route('partner') }}">Đối tác</a>
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
