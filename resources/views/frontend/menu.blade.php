<header class="site-header mo-left header navstyle2">
			<!-- main header -->
			<div class="sticky-header main-bar-wraper header-curve navbar-expand-lg">
				<div class="main-bar clearfix bg-primary">
					<div class="container clearfix">
						<!-- technologysite logo -->
						<div class="logo-header mostion" style="width: auto;">
							<a href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/hte-logo.png') }}" alt="" style="max-width: 258px; max-height: 70px"></a>
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
									<a href="{!! route('change-language', ['vi']) !!}"><img src="{{ asset('assets/frontend/images/vn.png') }}" alt="" style="display: inline;"></a>
									<a href="{!! route('change-language', ['en']) !!}"><img src="{{ asset('assets/frontend/images/gb.png') }}" alt="" style="display: inline;"></a>
								</li>
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
							{{-- <div class="logo-header d-md-block d-lg-none">
								<a href="index.html"><img src="images/hte-logo.png" alt=""></a>
							</div> --}}
							<ul class="nav navbar-nav">
								<li class="has-mega-menu homedemo menu-hover active"> <a href="{{ route('home') }}">{{trans('frontend.home')}}</a>
								</li>
								<li class="menu-hover">
									<a href="#">{{trans('frontend.present')}}<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu tab-content">
										@foreach($staticPagess as $staticPage)
										<li>
											<a href="{!! route('home.static-page', $staticPage['slug']) !!}">{{ $staticPage[$lang]['title'] }}</a>
											{{-- @dd($staticPage) --}}
										</li>
										@endforeach
									</ul>
								</li>
								<li class="menu-hover">
									<a href="#">{{trans('frontend.service')}}<i class="fa fa-chevron-down"></i></a>
									<ul class="sub-menu tab-content">
										@foreach($servicesCategories as $servicesCategory)
										@if (isset($servicesCategory['children']))
										<li>
											<a href="{!! route('home.services-category', ['slug' => str_slug($servicesCategory['vi']), 'id' => $servicesCategory['id']]) !!}">{{ $servicesCategory[$lang] }} <i class="fa fa-angle-right"></i></a>
											<ul class="sub-menu">
												@foreach($servicesCategory['children'] as $child)

												<li>
													<a href="{!! route('home.services-category', ['slug' => str_slug($child['vi']), 'id' => $child['id']]) !!}">{!! $child[$lang] !!} </a>
												</li>
												
												@endforeach
											</ul>
										</li>
										@else
										<li>
											<a href="{!! route('home.services-category', ['slug' => str_slug($servicesCategory['vi']), 'id' => $servicesCategory['id']]) !!}">{{ $servicesCategory[$lang] }}</a>

										</li>
										@endif
										@endforeach
									</ul>
								</li>
								<li class="has-mega-menu menu-hover"><a href="#">{{trans('frontend.project')}}<i
											class="fa fa-chevron-down"></i></a>
									<ul class="mega-menu">
										@foreach ($projectCategories as $projectCategory)
										<li>
											<a href="{!! route('project', ['slug' => str_slug($projectCategory['vi']['name']), 'id' => $projectCategory['id']]) !!}">{{trans('frontend.project')}} {{ $projectCategory[$lang]['name']}}</a>
											<ul>
												@php
													$i = 0;	
												@endphp
												@foreach ($projects as $project)
												@if ($projectCategory['id'] == $project['category_id'] && $project[$lang]['title'])
												<li><a href="{{ route('project-detail', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}">{!! \App\Helper\HString::modSubstr($project[$lang]['title'], 70)!!}</a></li>
												@php
													$i++;
													if ($i > 3) break;
												@endphp
												@endif
												@endforeach
											</ul>
										</li>
										@endforeach
									</ul>
								</li>
								<li class="has-mega-menu menu-hover"> <a href="{{ route('news') }}">{{trans('frontend.news')}}</a>
								</li>
								<li class="has-mega-menu menu-hover"> <a href="{{ route('career') }}">{{trans('frontend.career')}}</a>
								</li>
								{{-- <li class="has-mega-menu menu-hover"> <a href="{{ route('partner') }}">{{trans('frontend.partner')}}</a>
								</li> --}}
								<li class="has-mega-menu menu-hover"> <a href="https://mail.hte.vn">Mail</a>
								</li>
							</ul>
						</div>
						<!--main nav end-->
					</div>
				</div>
			</div>
			<!-- main header END -->
		</header>
