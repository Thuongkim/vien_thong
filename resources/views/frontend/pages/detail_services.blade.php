@extends('frontend.master')

@section('title'){!! strip_tags($detailService[0][$lang]['title']) !!}@stop

@section('seo_keywords'){!! strip_tags($detailService[0][$lang]['title']) !!}@stop
@section('seo_description'){!! strip_tags($detailService[0][$lang]['summary']) !!}@stop

@section('content')

<div class="animation-effects">
	<div class="dlab-bnr-inr overlay-black-middle bg-pt active wow zoomIn" style="background-image:url({{ asset('assets/frontend/images/main-slider/slide1.jpg') }});">
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
</div>

<div class="content-area">
    <div class="container">
        <div class="row">
            <!-- Left part start -->
            <div class="col-xl-9 col-lg-8 col-md-12 m-b30 wow fadeInLeftBig fly-box-ho" data-wow-delay="0.2s">
                <!-- blog start -->
                <div class="blog-post blog-single">
                    <div class="dlab-post-meta">
                        <ul>
                            <?php $user = \App\User::find($detailService[0]['created_by']); ?>
							<li class="post-date"> {{ $detailService[0]['created_at'] }} </li>
                        </ul>
                    </div>
                    <div class="dlab-post-title ">
                        <h4 class="post-title m-t0"><a href="blog-single-sidebar">{{ $detailService[0][$lang]['title'] }}</a></h4>
                    </div>
                    <div class="dlab-post-media dlab-img-effect zoom-slow">
                        <a href="blog-single-sidebar"><img src="images/blog/default/thum1.jpg" alt=""></a>
                    </div>
                    <div class="dlab-post-text">
                        {!! $detailService[0][$lang]['content'] !!}
                    </div>
                </div>

                <!-- blog END -->
            </div>
            <!-- Left part END -->
            <!-- Side bar start -->
            <div class="col-xl-3 col-lg-4 col-md-12">
                <aside class="side-bar sticky-top">

                    <div class="widget recent-posts-entry wow fadeInRightBig  fly-box-ho" data-wow-delay="0.3s">
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
                    

                    <div class="widget widget_archive wow fadeInRightBig fly-box-ho seth" data-wow-delay="0.6s">
                        <h5 class="widget-title style-1">{{trans('frontend.service_category')}}</h5>
                        <ul>
                            @foreach($servicesCategories as $servicesCategory)
							<li><a href="{!! route('home.services-category', ['slug' => str_slug($servicesCategory['vi']), 'id' => $servicesCategory['id']]) !!}">{!! $servicesCategory[$lang] !!}</a></li>
							@endforeach
                        </ul>
                    </div>
                    <div class="widget widget-project wow fadeInRightBig fly-box-ho" data-wow-delay="0.3s">
                        <h5 class="widget-title style-1">{{trans('frontend.project_n')}}</h5>
                        <div class="widget-project-box owl-none owl-loaded owl-theme owl-carousel dots-style-1 owl-dots-black-full">
                            @foreach ($news as $new)
                                <div class="item">
                                	<img src="{!! asset('assets/media/' . $new['image']) !!}" alt=""/>
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


@endsection
