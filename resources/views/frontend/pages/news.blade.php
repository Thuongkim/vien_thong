@extends('frontend.master')
@section('title'){!! trans('frontend.news') !!}@stop
@section('seo_keywords'){!! trans('frontend.news'). " " .config('app.name') !!}@stop
@section('seo_description'){!! trans('frontend.news'). " " .config('app.name') !!}@stop
@section('image'){!!  asset('assets/frontend/images/main-slider/slide1.jpg') !!}@stop
@section('content')
<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="animation-effects">
		<div class="dlab-bnr-inr overlay-black-middle bg-pt active wow zoomIn" style="background-image:url({{ asset('assets/frontend/images/main-slider/slide1.jpg') }});">
			<div class="container">
				<div class="dlab-bnr-inr-entry">
					<h1 class="text-white">{{trans('frontend.news_event')}}</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="{{ route('home') }}">{{trans('frontend.home')}}</a></li>
							<li>{{trans('frontend.news')}}</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
				</div>
			</div>
		</div>
	</div>
	<!-- inner page banner END -->
	<div class="content-area">
		<div class="container">
			<div class="row">
				<!-- Left part start -->
                <div class="col-lg-9">
                	@php
						$k = 0
					@endphp
					@foreach ($news as $news_st)
					@if($news_st[$lang]['title'])
					@php
						$k++;
					@endphp
					<div class="blog-post blog-md clearfix wow fadeInLeftBig fly-box-ho" data-wow-delay="@php
						echo($k % 2 == 0 ? '0.4s':'0.2s')
					@endphp">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							@if($news_st['image'])
							<img src="{!! asset('assets/media/' . $news_st['image']) !!}" alt="">
							@else
							<img src="https://via.placeholder.com/350x237.png?text=HTE-news" alt="">
							@endif
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-date"> <strong>{!! date("d/m", strtotime($news_st['updated_at'])) !!}</strong> <span> {!! date("/Y", strtotime($news_st['updated_at'])) !!}</span> </li>
									<li class="post-author"> {{trans('frontend.by')}} <a href="javascript:void(0);">{!! $news_st['created_by'] !!}</a> </li>
                                </ul>
                            </div>
							<div class="dlab-post-title">
                                <h4 class="post-title"><a href="{{ route('news.show', ['slug' => str_slug($news_st[$lang]['title']), 'id' => $news_st['id']]) }}">{!! \App\Helper\HString::modSubstr($news_st[$lang]['title'], 100) !!}</a></h4>
                            </div>
                            <div class="dlab-post-text">
                                <p>{!! \App\Helper\HString::modSubstr(strip_tags($news_st[$lang]['summary']), 200) !!}</p>
                            </div>
                            <div class="dlab-post-readmore">
								<a href="{{ route('news.show', ['slug' => str_slug($news_st[$lang]['title']), 'id' => $news_st['id']]) }}" title="READ MORE" rel="bookmark"
									class="site-button">{{trans('frontend.read_more')}}
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</div>
                    </div>
                    @endif
					@endforeach
                    <!-- Pagination start -->
					<div class="pagination-bx clearfix text-center">
						{!! $temp->links("frontend.pagination") !!}
					</div>
                    <!-- Pagination END -->
                </div>
				<!-- Left part END -->
				<!-- Side bar start -->
				<div class="col-xl-3 col-lg-3 col-md-3">
					<aside class="side-bar sticky-top">
						<div class="widget recent-posts-entry wow fadeInRightBig fly-box-ho" data-wow-delay="0.3s">
							<h5 class="widget-title style-1">{{trans('frontend.post')}}</h5>
							<div class="widget-post-bx">
								@php
									$i = 0;
								@endphp
								@foreach ($news_all as $news_nd)
								@if($news_nd[$lang]['title'])
								@php
									$i++;
								@endphp
								<div class="widget-post clearfix">
									<div class="dlab-post-media">
										@if($news_nd['image'])
										<img src="{!! asset('assets/media/' . $news_nd['image']) !!}" width="200" height="143" alt="">
										@else
										<img src="https://via.placeholder.com/200x143.png?text=HTE-news" >
										@endif
									</div>
									<div class="dlab-post-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>{!! date("d/m/Y", strtotime($news_nd['updated_at'])) !!}</strong> </li>
											</ul>
										</div>
										<div class="dlab-post-header">
											<h6 class="post-title"><a href="{{ route('news.show', ['slug' => str_slug($news_nd[$lang]['title']), 'id' => $news_nd['id']]) }}">{{ \App\Helper\HString::modSubstr(mb_strtolower($news_nd[$lang]['title']), 60) }}</a></h6>
										</div>
									</div>
								</div>
								@php
									if ($i == 3) break;
								@endphp
								@endif
								@endforeach()
							</div>
						</div>
						<div class="widget widget_archive wow fadeInRightBig fly-box-ho seth" data-wow-delay="0.6s">
                            <h5 class="widget-title style-1">{{trans('frontend.news_category')}}</h5>
                            <ul>
                                <li><a href="{{ route('news') }}">{{trans('frontend.news')}}</a></li>
                                <li><a href="{{ route('career') }}">{{trans('frontend.career')}}</a></li>
                                {{-- <li><a href="javascript:void(0);">Building Management</a></li>
                                <li><a href="javascript:void(0);">Power Systems</a></li>
                                <li><a href="javascript:void(0);">Power & Energy</a></li> --}}
                            </ul>
                        </div>
                        <div class="widget widget-project wow fadeInRightBig fly-box-ho" data-wow-delay="0.3s">
                            <h5 class="widget-title style-1">{{trans('frontend.featured_projects')}}</h5>
                            <div class="widget-project-box owl-none owl-loaded owl-theme owl-carousel dots-style-1 owl-dots-black-full">
                            	@php
                            		$j = 0;
                            	@endphp
                            	 @foreach ($projects as $project)
                    				@if ($project[$lang]['title'] && $project['image'])
                    					@php
                    						$j++;
                    					@endphp
                                		<div class="item">
                                			<a href="{{ route('project-detail', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}"><img src="{!! asset('assets/media/images/projects/' . $project['image']) !!}" alt=""></a>
                                		</div>
                            		@endif
                            		@php
                            			if($j == 3) break;
                            		@endphp
                        		@endforeach
                            </div>
                        </div>
					</aside>
				</div>
				<!-- Side bar END -->
			</div>
		</div>
	</div>
</div>
<!-- Content END-->

@endsection