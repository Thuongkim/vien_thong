@extends('frontend.master')

@section('content')

<!-- Content -->
<div class="page-content bg-white">
	<!-- inner page banner -->
	<div class="dlab-bnr-inr overlay-black-middle bg-pt"
		style="background-image:url({{ asset('assets/frontend/images/main-slider/slide1.jpg') }});">
		<div class="container">
			<div class="dlab-bnr-inr-entry">
				<h1 class="text-white">Tin tức</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><a href="{{ route('news') }}">Tin tức</a></li>
						<li>Chi tiết tin tức</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
			</div>
		</div>
	</div>
	<!-- inner page banner END -->
	<!-- contact area -->
	<div class="content-area">
		<div class="container">
			<div class="row">
				<!-- Left part start -->
				<div class="col-xl-9 col-lg-8 col-md-12">
					<!-- blog start -->
					<div class="blog-post blog-single">
						<div class="dlab-post-meta">
							<ul>
								<li class="post-date"> <strong>{!! date("d/m/Y", strtotime($project['updated_at'])) !!}</strong> </li>
							</ul>
						</div>
						<div class="dlab-post-title">
							<h4 class="post-title m-t0">{{ $project->translation('title', $lang)->first()->content }}</h4>
						</div>
						<div class="dlab-post-text">
							<p>{!! $project->translation('content', $lang)->first()->content !!}</p>
						</div>
						<div class="dlab-post-tags clear">
							{{-- <div class="post-tags">
								<a href="javascript:void(0);">tin tức mới </a>
								<a href="javascript:void(0);">tuyển dụng </a>
								<a href="javascript:void(0);">an toàn </a>
							</div> --}}
						</div>
					</div>
					<!-- blog END -->
				</div>
				<!-- Left part END -->
				<!-- Side bar start -->
				<div class="col-xl-3 col-lg-4 col-md-5 sticky-top">
					<aside class="side-bar">
						<div class="widget recent-posts-entry">
							<h5 class="widget-title style-1">BÀI VIẾT GẦN ĐÂY</h5>
							<div class="widget-post-bx">
								@foreach($news_all as $news_all)
								<div class="widget-post clearfix">
									{{-- <div class="dlab-post-media">
										@if($news_all['image'])
										<img src="{!! asset('assets/media/images/news/' . $news_all['image']) !!}" width="200" height="143" alt="">
										@endif
									</div> --}}
									<div class="dlab-post-info">
										<div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>{!! date("d/m/Y", strtotime($news_all['updated_at'])) !!}</strong> </li>
												<li class="post-author"> By <a href="javascript:void(0);">{{$news_all['created_by']}}
													</a> </li>
											</ul>
										</div>
										<div class="dlab-post-header">
											<h6 class="post-title"><a href="{{ route('news.show', $news_all['id']) }}">{{$news_all[$lang]['title']}}</a></h6>
										</div>
									</div>
								</div>
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