@extends('frontend.master')

@section('title'){!! $detailService[0][$lang]['title'] !!}@stop

@section('seo_keywords'){!! $detailService[0][$lang]['title'] !!}@stop
@section('seo_description'){!! $detailService[0][$lang]['summary'] !!}@stop

@section('content')

<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{ asset('assets/frontend/images/main-slider/slide1.jpg') }});">
	<div class="container">
		<div class="dlab-bnr-inr-entry">
			<h1 class="text-white">{{trans('frontend.service')}}</h1>
			<!-- Breadcrumb row -->
			<div class="breadcrumb-row">
				<ul class="list-inline">
					<li><a href="{{ route('home') }}">{{trans('frontend.home')}}</a></li>
					<li>{{trans('frontend.service')}}</li>
					<li>{!! $detailService[0][$lang]['title'] !!}</li>
				</ul>
			</div>
			<!-- Breadcrumb row END -->
		</div>
	</div>
</div>



<div class="content-area">
	<div class="container">
		<div class="row">
			<!-- Side bar start -->
			<div class="col-xl-3 col-lg-4 col-md-5 sticky-top">
				<aside class="side-bar">
					<div class="widget recent-posts-entry">
						<h5 class="widget-title style-1">{{trans('frontend.service')}}</h5>
						<div class="widget-post-bx">
							@foreach($featuredServices as $featuredService)
							<div class="widget-post clearfix">
								<div class="dlab-post-media">
									<img src="{{ asset($featuredService->image) }}" width="200" height="143" alt="">
								</div>
								<div class="dlab-post-info">
									<div class="dlab-post-meta">
										<ul>
											<?php $user = \App\User::find( $services->created_by ); ?>
											<li class="post-date"> {{ $featuredService->created_at }} </li>
											<li class="post-author"> {{trans('frontend.by')}}: {!! is_null($user) ? '-' : $user->fullname !!} </li>
										</ul>
									</div>
									<div class="dlab-post-header">
										<h6 class="post-title"><a href="{!! route('home.services-detail', ['slug' => str_slug($featuredService->title), 'id' => $featuredService->id]) !!}">{{ $featuredService->title }}</a></h6>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="widget widget_archive">
						<h5 class="widget-title style-1">{{trans('frontend.categories')}}</h5>
						<ul>
							@foreach($servicesCategories as $servicesCategory)
							<li><a href="{!! route('home.services-category', ['slug' => str_slug($servicesCategory['vi']), 'id' => $servicesCategory['id']]) !!}">{!! $servicesCategory[$lang] !!}</a></li>
							@endforeach
						</ul>
					</div>
				</aside>
			</div>
			<!-- Side bar END -->
			<!-- Left part start -->
			<div class="col-xl-9 col-lg-8 col-md-12">
				<!-- blog start -->
				<div class="blog-post blog-single">
					<div class="dlab-post-meta">
						<ul>
							<?php $user = \App\User::find($detailService[0]['created_by']); ?>
							<li class="post-date"> {{ $detailService[0]['created_at'] }} </li>
							<li class="post-author"> {{trans('frontend.by')}}: {!! is_null($user) ? '-' : $user->fullname !!} </li>
						</ul>
					</div>
					<div class="dlab-post-title">
						<h4 class="post-title m-t0"><a href="blog-single-sidebar">{{ $detailService[0][$lang]['title'] }}</a></h4>
					</div>
					<div class="dlab-post-media dlab-img-effect zoom-slow">
						<a href="blog-single-sidebar"><img src="{{ asset($detailService[0]['image']) }}" alt=""></a>
					</div>
					<div class="dlab-post-text">
						{!! $detailService[0][$lang]['content'] !!}
					</div>
					
				</div>
				<!-- blog END -->
			</div>
			<!-- Left part END -->
		</div>
	</div>
</div>


	@endsection
