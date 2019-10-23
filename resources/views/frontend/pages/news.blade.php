@extends('frontend.master')
@section('title'){!! trans('frontend.news') !!}@stop
@section('seo_keywords'){!! trans('frontend.news'). " " .config('app.name') !!}@stop
@section('seo_description'){!! trans('frontend.news'). " " .config('app.name') !!}@stop
@section('image'){!!  asset('assets/frontend/images/main-slider/slide1.jpg') !!}@stop

@section('content')

<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="dlab-bnr-inr overlay-black-middle bg-pt"
		style="background-image:url({{ asset('assets/frontend/images/main-slider/slide1.jpg') }});">
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
	<!-- inner page banner END -->
	<div class="content-area">
		<div class="container">
			<div class="row">
				<!-- Left part start -->
				<div class="col-xl-9 col-lg-8 col-md-7">
					@foreach ($news as $news_st)
					@if($news_st[$lang]['title'])
					<div class="blog-post blog-lg blog-rounded dlab-info p-a20 border-1">
						<div class="dlab-post-media dlab-img-effect zoom-slow col-xl-4 col-lg-4 col-md-4">
							@if($news_st['image'])
							<img src="{!! asset('assets/media/images/news/' . $news_st['image']) !!}" alt="">
							@endif
						</div>
						<div class="dlab-info p-a20">
							<div class="dlab-post-meta">
								<ul>
									<li class="post-date"> <strong>{!! date("d/m", strtotime($news_st['updated_at'])) !!}</strong> <span> {!! date("/Y", strtotime($news_st['updated_at'])) !!}</span> </li>
									<li class="post-author"> {{trans('frontend.by')}} <a href="javascript:void(0);">{{$news_st['created_by']}}</a> </li>
								</ul>
							</div>
							<div class="dlab-post-title">
								<h4 class="post-title"><a href="{{ route('news.show', ['slug' => str_slug($news_st[$lang]['title']), 'id' => $news_st['id']]) }}">{{$news_st[$lang]['title']}}</a></h4>
							</div>
							<div class="dlab-post-text">
								<p>{{$news_st[$lang]['summary']}}</p>
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
					{!! $temp->links("frontend.pagination") !!}
					<!-- Pagination END -->
				</div>
				<!-- Left part END -->
				<!-- Side bar start -->
				<div class="col-xl-3 col-lg-4 col-md-5 sticky-top">
					<aside class="side-bar">
						<div class="widget recent-posts-entry">
							<h5 class="widget-title style-1">{{trans('frontend.post')}}</h5>
							<div class="widget-post-bx">
								@foreach ($news_all as $news_nd)
								<div class="widget-post clearfix">
									{{-- <div class="dlab-post-media">
										@if($news_nd['image'])
										<img src="{!! asset('assets/media/images/news/' . $news_nd['image']) !!}" width="200" height="143" alt="">
										@endif
									</div> --}}
									<div class="dlab-post-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>{!! date("d/m/Y", strtotime($news_nd['updated_at'])) !!}</strong> </li>
												<li class="post-author"> {{trans('frontend.by')}} <a href="javascript:void(0);">{{$news_nd['created_by']}}
													</a> </li>
											</ul>
										</div>
										<div class="dlab-post-header">
											<h6 class="post-title"><a href="{{ route('news.show', ['slug' => str_slug($news_nd[$lang]['title']), 'id' => $news_nd['id']]) }}">{{$news_nd[$lang]['title']}}</a></h6>
										</div>
									</div>
								</div>
								@endforeach()
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