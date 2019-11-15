@extends('frontend.master')

@section('title'){!! strip_tags($categories[0][$lang]['name']) !!}@stop

@section('seo_keywords'){!! strip_tags($detailService[0][$lang]['name']) !!}@stop
@section('seo_description'){!! strip_tags($detailService[0][$lang]['name']) !!}@stop

@section('content')

<!-- Content -->


<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="animation-effects">
		<div class="dlab-bnr-inr overlay-black-middle bg-pt active wow zoomIn" style="background-image:url({{ asset('assets/frontend/images/main-slider/abc.png') }});">
			<div class="container">
				<div class="dlab-bnr-inr-entry">
					<h1 class="text-white">{!! $categories[0][$lang]['name'] !!}</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="{{ route('home') }}">{!! trans('frontend.home') !!}</a></li>
							<li>{!! $categories[0][$lang]['name'] !!}</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
				</div>
			</div>
		</div>
	</div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-area">
        <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-9">
                	<?php 
                		$i = 0;  
                		$time = ['0.2','0.4'];   
                		           		
                	?>
					@foreach($serviceCategories as $service)
                    <div class="blog-post blog-md clearfix wow fadeInLeftBig fly-box-ho" data-wow-delay="{!! $i++%2 ? $time[1] : $time[0] !!}s" style="visibility: visible; animation-name: fadeInLeftBig;">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}"><img src="{{ asset($service['image']) }}" style="max-height: 260px"></a>
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                	<li class="post-date"> <strong>{!! date("d/m", strtotime($service['updated_at'])) !!}</strong> <span> {!! date("/Y", strtotime($service['updated_at'])) !!}</span> </li>
                                	<li class="post-author"> {{trans('frontend.by')}} <a href="">{{$service['created_by']}}</a> </li>
                                </ul>
                            </div>
							<div class="dlab-post-title">
                                <h4 class="post-title"><a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}">{{ $service[$lang]['title'] }}</a></h4>
                            </div>
                            <div class="dlab-post-text">
                                <p>{!! \App\Helper\HString::modSubstr($service[$lang]['summary'], 100) !!}</p>
                            </div>
                            <div class="dlab-post-readmore">
                            	<a href="{!! route('home.services-detail', ['slug' => str_slug($service[$lang]['title']), 'id' => $service['id']]) !!}" title="READ MORE" rel="bookmark"
                            		class="site-button">{{trans('frontend.read_more')}}
                            		<i class="ti-arrow-right"></i>
                            	</a>
							</div>
						</div>
                    </div>
					@endforeach
                    <!-- Pagination start -->
					<div class="pagination-bx clearfix text-center">
						{!! $services->links("frontend.pagination") !!}
					</div>
                    <!-- Pagination END -->
                </div>
                <!-- Side bar start -->
                <div class="col-lg-3">
                    <aside  class="side-bar sticky-top">

                        <div class="widget recent-posts-entry  wow fadeInRightBig  fly-box-ho" data-wow-delay="0.3s">
                            <h5 class="widget-title style-1">{{trans('frontend.service')}}</h5>
                            <div class="widget-post-bx">
								@foreach ($servicesNew as $servicesN)
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media">
                                        <img src="{{ asset($servicesN['image']) }}" style="max-height: 82px; max-width: 110px">
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
                                            <ul>
                                            	<li class="post-date"> <strong>{!! date("d/m/Y", strtotime($servicesN['updated_at'])) !!}</strong> </li>
                                            	{{-- <li class="post-author"> {{trans('frontend.by')}} <a href="javascript:void(0);">{{$servicesN['created_by']}}
                                            	</a> </li> --}}
                                            </ul>
                                        </div>
                                        <div class="dlab-post-header">
                                            <h6 class="post-title"><a href="{!! route('home.services-detail', ['slug' => str_slug($servicesN[$lang]['title']), 'id' => $service['id']]) !!}">{{$servicesN[$lang]['title']}}</a></h6>
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
                            	<li>
                            		<a href="{!! route('home.services-category', ['slug' => str_slug($servicesCategory['vi']), 'id' => $servicesCategory['id']]) !!}">{{ $servicesCategory[$lang] }}</a>

                            	</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget widget-project wow fadeInRightBig fly-box-ho" data-wow-delay="0.3s">
                            <h5 class="widget-title style-1">{{trans('frontend.project_n')}}</h5>
                            <div class="widget-project-box owl-none owl-loaded owl-theme owl-carousel dots-style-1 owl-dots-black-full">
								@foreach ($news as $new)
                                <div class="item">
                                    <a href="{{ route('news.show', ['slug' => str_slug($new[$lang]['title']), 'id' => $new['id']]) }}">
                                       <img src="{!! asset('assets/media/' . $new['image']) !!}" alt=""/>
                                   </a>
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

