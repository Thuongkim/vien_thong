@extends('frontend.master')

@section('title'){!! trans('frontend.home') !!}@stop

@section('seo_keywords'){!! isset($staticPages[$lang]['seo-keywords']['description']) ? $staticPages[$lang]['seo-keywords']['description'] : '' !!}@stop
@section('seo_description'){!! isset($staticPages[$lang]['seo-description']['description']) ? $staticPages[$lang]['seo-description']['description'] : '' !!}@stop

@section('content')

<div class="page-content bg-white">
			<!-- Slider -->
			<div class="main-slider style-two default-banner" id="home">
				<div class="tp-banner-container">
					<div class="tp-banner">
						<div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container"
							data-alias="reveal-add-on36" data-source="gallery" style="background:#ffffff;padding:0px;">
							<!-- START REVOLUTION SLIDER 5.4.7.2 fullscreen mode -->
							<div id="welcome" class="rev_slider fullscreenbanner" style="display:none;"
								data-version="5.4.7.2">
								<ul>
									<!-- SLIDE  -->
									@foreach($sliders as $slider)
									<li data-index="rs-100" data-transition="slideoververtical"
										data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"
										data-easein="default" data-easeout="default" data-masterspeed="default"
										data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide"
										data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
										data-param6="" data-param7="" data-param8="" data-param9="" data-param10=""
										data-description="">
										<!-- MAIN IMAGE -->
										<img src="{{ asset('assets/frontend/images/main-slider/dummy.png') }}" alt=""
											data-lazyload="{!! asset($slider['image']) !!}"
											data-bgposition="center center" data-kenburns="on" data-duration="4000"
											data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100"
											data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0"
											data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="4"
											class="rev-slidebg" data-no-retina>
										<!-- LAYER NR. 1 -->
										<!-- LAYERS -->
										<div class="tp-caption tp-shape tp-shapewrapper " id="slide-100-layer"
											data-x="['center','center','center','center']"
											data-hoffset="['0','0','0','0']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['0','0','0','0']" data-width="full" data-height="full"
											data-whitespace="nowrap" data-type="shape" data-basealign="slide"
											data-responsive_offset="off" data-responsive="off"
											data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]'
											data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
											data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
											data-paddingleft="[0,0,0,0]"
											style="z-index: 2;background-color:rgba(0, 0, 0, 0.1);border-color:rgba(0, 0, 0, 0);border-width:0px; background-image:url(images/overlay/rrdiagonal-line.png)">
										</div>
										<!-- LAYER NR. 1 -->

										<div class="tp-caption tp-shape tp-shapewrapper ov-tp " id="slide-100-layer-1"
											data-x="['center','center','center','center']"
											data-hoffset="['0','0','0','0']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['0','0','0','0']" data-width="full" data-height="full"
											data-whitespace="nowrap" data-type="shape" data-basealign="slide"
											data-responsive_offset="off" data-responsive="off"
											data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]'
											data-textAlign="['inherit','inherit','inherit','inherit']"
											data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
											data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
											style="z-index: 5;font-family: 'rubik', sans-serif;">
										</div>
										<div class="tp-caption " id="slide-100-layer-3"
											data-x="['center','center','center','center']"
											data-hoffset="['-90','-200','0','0']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['-100','-100','-100','-90']"
											data-fontsize="['65','40','40','30']"
											data-lineheight="['80','40','40','30']"
											data-letterspacing="['2','2','2','2']"
											data-width="['1000','none','768','360']" data-height="none"
											data-whitespace="['normal','nowrap','normal','normal']" data-type="text"
											data-responsive_offset="off" data-responsive="off"
											data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
											data-textAlign="['left','left','center','center']"
											data-paddingtop="[0,0,0,0]" data-paddingright="[10,10,0,0]"
											data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
											style="z-index: 6; min-width: 800px; max-width: 800px; font-weight: 600; white-space: normal; color: #fff; font-family: 'Poppins',sans-serif;">
											<!-- Fast and Reliable <br/>Electrical services -->
										</div>
										<!-- LAYER NR. 3 -->
										<div class="tp-caption" id="slide-100-layer-4"
											data-x="['center','center','center','center']"
											data-hoffset="['-265','-165','0','0']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['50','0','-5','00']" data-fontsize="['18','16','14','14']"
											data-lineheight="['30','30','26','26']"
											data-width="['640','481','500','300']" data-height="none"
											data-whitespace="normal" data-type="text" data-responsive_offset="off"
											data-responsive="off"
											data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
											data-textAlign="['left','left','center','center']"
											data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
											data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
											style="z-index: 7; min-width: 640px; max-width: 640px; font-weight: 700; font-size: 18px; line-height: 30px; font-weight: 400; color: #fff; font-family: 'Poppins',sans-serif;">
										</div>
										<!-- LAYER NR. 5 -->
										<a class="tp-caption rev-btn tc-btnshadow tp-rs-menulink" href="#"
											target="_blank" id="slide-100-layer-5"
											data-x="['center','center','center','center']"
											data-hoffset="['-510','-335','-100','-80']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['160','90','80','90']"
											data-lineheight="['18','18','18','18']" data-whitespace="nowrap"
											data-type="button" data-actions='' data-responsive_offset="off"
											data-responsive="off"
											data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"x:-50px;z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;fbr:100;","bgcolor":"#000000","to":"o:1;fbr:100;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","bgcolor":"#000000","to":"opacity:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"150","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fbr:90%;","style":"c:rgba(255,255,255,1);"}]'
											data-textAlign="['center','center','center','center']"
											data-paddingtop="[15,15,15,10]" data-paddingright="[30,30,30,20]"
											data-paddingbottom="[15,15,15,10]" data-paddingleft="[30,30,30,20]"
											style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1); font-family:rubik; background-color:#fc1520; text-transform: uppercase;">
										
											{{trans('frontend.about-us')}}
											
										</a>
										<!-- LAYER NR. 5 -->
										{{-- <a class="tp-caption rev-btn tc-btnshadow tp-rs-menulink"
											href="services-details.html" target="_blank" id="slide-100-layer-6"
											data-x="['center','center','center','center']"
											data-hoffset="['-340','-160','70','70']"
											data-y="['middle','middle','middle','middle']"
											data-voffset="['160','90','80','90']"
											data-lineheight="['18','18','18','18']" data-whitespace="nowrap"
											data-type="button" data-actions='' data-responsive_offset="off"
											data-responsive="off"
											data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"x:-50px;z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;fbr:100;","bgcolor":"#000000","to":"o:1;fbr:100;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","bgcolor":"#000000","to":"opacity:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"150","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fbr:90%;","style":"c:rgba(255,255,255,1);"}]'
											data-textAlign="['center','center','center','center']"
											data-paddingtop="[15,15,15,10]" data-paddingright="[30,30,30,20]"
											data-paddingbottom="[15,15,15,10]" data-paddingleft="[30,30,30,20]"
											style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1); font-family:rubik; background-color:#fc1520; text-transform: uppercase;">
											Dịch vụ
										</a> --}}
									</li>
									@endforeach
								</ul>
								<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
							</div>
						</div>
						<!-- END REVOLUTION SLIDER -->
					</div>
				</div>
			</div>
			<!-- Slider END -->
			<!-- contact area -->
			<div class="content-block">
				<!-- Call To Action End -->
				<div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s"
					data-wow-delay="0.2s">
					<div class="container">
						<div class="row">
							<div class="col-lg-9 text-white">
								<h2 class="title">{{trans('frontend.introduction')}}</h2>
								<p class="m-b0">
								{!! isset($staticPages[$lang]['index']['description']) ? $staticPages[$lang]['index']['description'] : '' !!}
								</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Call To Action End -->



				<!-- About Us -->
				<div class="section-full content-inner bg-white wow fadeIn" data-wow-duration="2s"
					data-wow-delay="0.4s">
					<div class="container">
						<div class="section-head text-black text-center">
							{!! isset($staticPages[$lang]['service']['description']) ? $staticPages[$lang]['service']['description'] : '' !!}
						</div>
						<div class="on-show-slider ">
							
							<div id="sync2" class="owl-carousel owl-theme owl-none owl-dots-none project-list">
								@foreach($servicesLangs as $servicesLang)
								<div class="item">
									<div class="project-owbx">
										<i class="fa {{ $servicesLang['icon'] }}"></i>
										<h4 class="title">{{ $servicesLang[$lang]['title'] }}</h4>
									</div>
								</div>
								@endforeach
							</div>
							<div id="sync1"
								class="owl-carousel owl-theme owl-btn-center-lr m-b5 owl-dots-none owl-btn-3 primary">
								@foreach($servicesLangs as $servicesLang)
								<div class="item">
									<div class="row align-items-center">
										<div class="col-lg-6 col-md-6 m-b30">
											<div class="our-story">
												<h2 class="title"><span class="text-primary">{{ $servicesLang[$lang]['title'] }}</span>
												</h2>
												{!! $servicesLang[$lang]['content'] !!}
												<br>

											</div>
										</div>
										<div class="col-lg-6 col-md-6 m-b30">
											<img src="{{ asset($servicesLang['image']) }}" class="radius-sm" alt="">
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>

					</div>
				</div>
				<!-- About Us End -->



				<!-- Client logo -->
				<div class="section-full content-inner-2 bg-gray wow fadeIn" data-wow-duration="2s"
					data-wow-delay="0.6s">
					<div class="container">
						<div class="section-head text-black text-center">
							<h2 class="title text-capitalize">{{trans('frontend.partner')}}</h2>
						</div>
						<div
							class="client-logo-carousel owl-loaded owl-theme owl-carousel owl-dots-none owl-btn-center-lr owl-btn-3">
							@foreach ($partners as $partner)
							<div class="item">
								<div class="ow-client-logo">
									<div class="client-logo border">
										<a href="javascript:void(0);"><img src="{!! asset('assets/media/images/partners/' . $partner['image']) !!}" alt=""></a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<!-- Client logo End -->
				<!-- Services -->
				<!-- Portfolio  -->
				<div class="section-full content-inner portfolio text-uppercase bg-white" id="portfolio">
					<div class="container">
						<div class="site-filters clearfix center  m-b40">
							<ul class="filters" data-toggle="buttons">
								<li data-filter="" class="btn active">
									<input type="radio">
									<a href="javascript:void(0);"
										class="site-button-secondry button-sm radius-xl"><span>{{trans('frontend.all')}}</span></a>
								</li>
								@foreach ($projectCategories as $projectCategory)
								<li data-filter="{{ $projectCategory['id']}}" class="btn">
									<input type="radio">
									<a href="javascript:void(0);"
										class="site-button-secondry button-sm radius-xl"><span>{{trans('frontend.project')}} {{ $projectCategory[$lang]['name']}}</span></a>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="clearfix" id="lightgallery">
							<ul id="masonry"
								class=" portfolio-ic dlab-gallery-listing gallery-grid-4 gallery lightgallery text-center">
								@foreach ($projects as $project)
								@if (!$project['image'] && $project[$lang]['title'])
								<li class="{{ $project['category_id']}} design card-container col-lg-3 col-md-6 col-sm-6 p-a0">
									<div class="dlab-box dlab-gallery-box">
										<div class="dez-info p-a30 bg-white">
											@if ($project[$lang]['title'])
											<b><p class="dez-title m-t0" style="text-transform: capitalize;">
												<a href="{{ route('project.show', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}">
												{!! \App\Helper\HString::modSubstr($project[$lang]['title'], 50)!!}
												</a>
											</p></b>
											@endif
										</div>
									</div>
								</li>
								@elseif ($project[$lang]['title'])
								<li class="{{ $project['category_id']}} design card-container col-lg-3 col-md-6 col-sm-6 p-a0">
									<div class="dlab-box dlab-gallery-box">
										<div class="dlab-media dlab-img-overlay1 dlab-img-effect">
											<a> <img src="{!! asset('assets/media/images/projects/' . $project['image']) !!}" alt="">
											</a>
											<div class="overlay-bx">
												<div class="overlay-icon">
													<div class="text-white">
														<a href="{{ route('project.show', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}"><i
																class="fa fa-link icon-bx-xs"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="dez-info p-a30 bg-white">
											<b><p class="dez-title m-t0" style="text-transform: capitalize;">
												<a href="{{ route('project.show', ['slug' => str_slug($news[$lang]['title']), 'id' => $news['id']]) }}">
												{!! \App\Helper\HString::modSubstr($project[$lang]['title'], 50)!!}
												</a>
											</p></b>
										</div>
									</div>
								</li>
								@endif
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<!-- Services End -->
				<!-- Latest Blog -->
				<div class="section-full bg-white">
					<div class="container">
						<div class="section-head text-black text-center">
							<h2 class="title text-capitalize">{{trans('frontend.news_event')}}</h2>
						</div>
						<!-- blog post Carousel with no margin -->
						<div class="section-content box-sort-in m-b30 button-example">
							<div
								class="blog-carousel mfp-gallery owl-loaded owl-theme owl-carousel gallery owl-btn-center-lr owl-btn-1 primary">
								@foreach ($news as $news)
								@if ($news[$lang]['title'])
								<div class="item">
									<div class="ow-blog-post date-style-2">
										<div class="ow-post-media dlab-img-effect zoom-slow">
											@if($news['image'])
											<a href="{{ route('news.show', ['slug' => str_slug($news[$lang]['title']), 'id' => $news['id']]) }}">
												<img src="{!! asset('assets/media/images/news/' . $news['image']) !!}" style="height: 250px;" alt="">
											</a>
											@endif
										</div>
										<div class="ow-post-info">
											<div class="ow-post-title">
												<h4 class="post-title" style="min-height: 60px;font-size: 20px"> <a href="{{ route('news.show', ['slug' => str_slug($news[$lang]['title']), 'id' => $news['id']]) }}"
														title="news">{{$news[$lang]['title']}}</a> </h4>
											</div>
											<div class="ow-post-meta">
												<ul>
													<li class="post-date"> <i
															class="ti-comment-alt"></i><strong>{!! date("d/m", strtotime($news['updated_at'])) !!}</strong> <span>
															{!! date("Y", strtotime($news['updated_at'])) !!}</span> </li>
													<li class="post-author"><i class="ti-user"></i>{{trans('frontend.by')}} <a
															href="javascript:void(0);" title="Posts by admin"
															rel="author">{{$news['created_by']}}</a> </li>
												</ul>
											</div>
											<div class="ow-post-text">
												<p>{{$news[$lang]['summary']}}</p>
											</div>
										</div>
									</div>
								</div>
								@endif
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- blog post Carousel with no margin END -->
		</div>
	</div>
	<!-- Latest Blog End -->
	</div>
	<!-- contact area END -->
	</div>


@endsection
