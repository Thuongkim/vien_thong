@extends('frontend.master')

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
				</ul>
			</div>
			<!-- Breadcrumb row END -->
		</div>
	</div>
</div>



<div class="content-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="jumbotron">
					@foreach($serviceCategories as $service)
					<article id="post-1256" class="post-1256 post type-post status-publish format-standard has-post-thumbnail hentry category-su-kien category-tin-tuc">
						<div class="entry-thumbnail">
							<img width="150" height="150" src="{{ asset($service['image']) }}" class="attachment-thumbnail wp-post-image" alt="Hình ảnh"> </div>

							<header class="entry-header">

								<h2 class="entry-title">
									<a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}" rel="bookmark">{{ $service[$lang]['title'] }}</a>
								</h2>
								<div class="entry-meta">
									<ul>
										<li class="date"><i class="icon icon-time"></i>&nbsp;{!! \App\Helper\HString::timeElapsedString(strtotime($service->updated_at)) !!}</li>
									</ul>
								</div>
								<!--/.entry-meta -->
							</header>
							<!--/.entry-header -->
							<div class="entry-content">
								<p style="text-align: left;">{!! $service[$lang]['summary'] !!}</p>
							</div>
							<div class="dlab-post-readmore">
								<a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}" title="READ MORE" rel="bookmark"
									class="site-button">{{trans('frontend.read_more')}}
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</article>
					@endforeach
					{!! $services->links("frontend.pagination") !!}
					</div>
				</div>
				
			</div>
		</div>
	</div>



	@endsection