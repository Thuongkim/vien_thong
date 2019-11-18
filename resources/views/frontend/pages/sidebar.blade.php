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
		<div class="dlab-bnr-inr overlay-black-middle bg-pt active wow zoomIn" style="background-image:url({{ asset('assets/frontend/images/main-slider/abc.png') }});">
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
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="blog-post blog-lg blog-rounded">
						<div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="{{ asset('assets/frontend/images/blog/default/thum1.jpg') }}" alt=""></a>
						</div>
						<div class="dlab-info p-a20 border-1">
							<div class="dlab-post-meta">
								<ul>
									<li class="post-date"> <strong>20 Aug</strong> <span> 2016</span> </li>
									<li class="post-author"> By <a href="javascript:void(0);">Oliver</a> </li>
								</ul>
							</div>
							<div class="dlab-post-title">
								<h4 class="post-title"><a href="blog-single.html">Why Are Children So Obsessed</a></h4>
							</div>
							<div class="dlab-post-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
									text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
							<div class="dlab-post-readmore">
								<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button">READ MORE
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="blog-post blog-lg blog-rounded">
						<div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="{{ asset('assets/frontend/images/blog/default/thum2.jpg') }}" alt=""></a>
						</div>
						<div class="dlab-info p-a20 border-1">
							<div class="dlab-post-meta">
								<ul>
									<li class="post-date"> <strong>19 Aug</strong> <span> 2016</span> </li>
									<li class="post-author"> By <a href="javascript:void(0);">Harry</a> </li>
								</ul>
							</div>
							<div class="dlab-post-title">
								<h4 class="post-title"><a href="blog-single.html">How To Get People To Like Industry</a></h4>
							</div>
							<div class="dlab-post-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
									text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
							<div class="dlab-post-readmore">
								<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button">READ MORE
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="blog-post blog-lg blog-rounded">
						<div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="{{ asset('assets/frontend/images/blog/default/thum3.jpg') }}" alt=""></a>
						</div>
						<div class="dlab-info p-a20 border-1">
							<div class="dlab-post-meta">
								<ul>
									<li class="post-date"> <strong>18 Aug</strong> <span> 2016</span> </li>
									<li class="post-author"> By <a href="javascript:void(0);">Anna</a> </li>
								</ul>
							</div>
							<div class="dlab-post-title">
								<h4 class="post-title"><a href="blog-single.html">The Story Of Industry Has Just</a></h4>
							</div>
							<div class="dlab-post-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
									text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
							<div class="dlab-post-readmore">
								<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button">READ MORE
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="blog-post blog-lg blog-rounded">
						<div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="{{ asset('assets/frontend/images/blog/default/thum4.jpg') }}" alt=""></a>
						</div>
						<div class="dlab-info p-a20 border-1">
							<div class="dlab-post-meta">
								<ul>
									<li class="post-date"> <strong>16 Aug</strong> <span> 2016</span> </li>
									<li class="post-author"> By <a href="javascript:void(0);">Brianna</a> </li>
								</ul>
							</div>
							<div class="dlab-post-title ">
								<h4 class="post-title"><a href="blog-single.html">Seven Outrageous Ideas Industry</a></h4>
							</div>
							<div class="dlab-post-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
									text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
							<div class="dlab-post-readmore">
								<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button">READ MORE
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="blog-post blog-lg blog-rounded">
						<div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="{{ asset('assets/frontend/images/blog/default/thum1.jpg') }}" alt=""></a>
						</div>
						<div class="dlab-info p-a20 border-1">
							<div class="dlab-post-meta">
								<ul>
									<li class="post-date"> <strong>10 Aug</strong> <span> 2016</span> </li>
									<li class="post-author"> By <a href="javascript:void(0);">Jack</a> </li>
								</ul>
							</div>
							<div class="dlab-post-title">
								<h4 class="post-title"><a href="blog-single.html">How Industry Can Increase</a></h4>
							</div>
							<div class="dlab-post-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
									text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
							<div class="dlab-post-readmore">
								<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button">READ MORE
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="blog-post blog-lg blog-rounded">
						<div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="{{ asset('assets/frontend/images/blog/default/thum2.jpg') }}" alt=""></a>
						</div>
						<div class="dlab-info p-a20 border-1">
							<div class="dlab-post-meta">
								<ul>
									<li class="post-date"> <strong>10 Aug</strong> <span> 2016</span> </li>
									<li class="post-author"> By <a href="javascript:void(0);">Victoria</a> </li>
								</ul>
							</div>
							<div class="dlab-post-title">
								<h4 class="post-title"><a href="blog-single.html">Here's What People Are Saying</a></h4>
							</div>
							<div class="dlab-post-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
									text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
							<div class="dlab-post-readmore">
								<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button">READ MORE
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
                    <!-- Pagination start -->
                    <div class="pagination-bx m-b30 clearfix text-center">
						<ul class="pagination">
							<li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a></li>
							<li class="active"><a href="javascript:void(0);">1</a></li>
							<li><a href="javascript:void(0);">2</a></li>
							<li><a href="javascript:void(0);">3</a></li>
							<li class="next"><a href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a></li>
						</ul>
					</div>
                    <!-- Pagination END -->
                </div>
                <!-- Left part END -->
                <!-- Side bar start -->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <aside class="side-bar sticky-top">

                        <div class="widget recent-posts-entry">
                            <h5 class="widget-title style-1">Recent Posts</h5>
                            <div class="widget-post-bx">
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media">
										<img src="{{ asset('assets/frontend/images/blog/recent-blog/pic1.jpg') }}" width="200" height="143" alt="">
									</div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>13 Aug</strong> </li>
												<li class="post-author"> By <a href="javascript:void(0);">Jack </a> </li>
											</ul>
										</div>
										<div class="dlab-post-header">
                                            <h6 class="post-title"><a href="blog-single-left-sidebar.html">How To Get People To Like Industry</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media">
										<img src="{{ asset('assets/frontend/images/blog/recent-blog/pic2.jpg') }}" width="200" height="160" alt="">
									</div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>13 Aug</strong> </li>
												<li class="post-author"> By <a href="javascript:void(0);">Jamie </a> </li>
											</ul>
										</div>
										<div class="dlab-post-header">
                                            <h6 class="post-title"><a href="blog-single-left-sidebar.html">Seven Doubts You Should Clarify About</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media">
										<img src="{{ asset('assets/frontend/images/blog/recent-blog/pic3.jpg') }}" width="200" height="160" alt="">
									</div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
											<ul>
												<li class="post-date"> <strong>13 Aug</strong> </li>
												<li class="post-author"> By <a href="javascript:void(0);">Winnie </a> </li>
											</ul>
										</div>
										<div class="dlab-post-header">
                                            <h6 class="post-title"><a href="blog-single-left-sidebar.html">Why You Should Not Go To Industry</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

						<div class="widget widget_gallery gallery-grid-4">
                            <h5 class="widget-title style-1">Our Gallery</h5>
                            <ul id="lightgallery" class="lightgallery">
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="{{ asset('assets/frontend/images/gallery/pic1.jpg') }}" data-src="{{ asset('assets/frontend/images/gallery/pic1.jpg') }}" class="check-km" title="Image 1 Title will come here">
											<img src="{{ asset('assets/frontend/images/gallery/pic1.jpg') }}" alt="">
										</span>
									</div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="{{ asset('assets/frontend/images/gallery/pic2.jpg') }}" data-src="{{ asset('assets/frontend/images/gallery/pic2.jpg') }}" class="check-km" title="Image 2 Title will come here">
											<img src="{{ asset('assets/frontend/images/gallery/pic2.jpg') }}" alt="">
										</span>
									</div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="{{ asset('assets/frontend/images/gallery/pic3.jpg') }}" data-src="{{ asset('assets/frontend/images/gallery/pic3.jpg') }}" class="check-km" title="Image 3 Title will come here">
											<img src="{{ asset('assets/frontend/images/gallery/pic3.jpg') }}" alt="">
										</span>
									</div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="{{ asset('assets/frontend/images/gallery/pic4.jpg') }}" data-src="{{ asset('assets/frontend/images/gallery/pic4.jpg') }}" class="check-km" title="Image 4 Title will come here">
											<img src="{{ asset('assets/frontend/images/gallery/pic4.jpg') }}" alt="">
										</span>
									</div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="{{ asset('assets/frontend/images/gallery/pic5.jpg') }}" data-src="{{ asset('assets/frontend/images/gallery/pic5.jpg') }}" class="check-km" title="Image 5 Title will come here">
											<img src="{{ asset('assets/frontend/images/gallery/pic5.jpg') }}" alt="">
										</span>
									</div>
                                </li>
                                <li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="{{ asset('assets/frontend/images/gallery/pic6.jpg') }}" data-src="{{ asset('assets/frontend/images/gallery/pic6.jpg') }}" class="check-km" title="Image 6 Title will come here">
											<img src="{{ asset('assets/frontend/images/gallery/pic6.jpg') }}" alt="">
										</span>
									</div>
                                </li>
								 <li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="{{ asset('assets/frontend/images/gallery/pic7.jpg') }}" data-src="{{ asset('assets/frontend/images/gallery/pic7.jpg') }}" class="check-km" title="Image 7 Title will come here">
											<img src="{{ asset('assets/frontend/images/gallery/pic7.jpg') }}" alt="">
										</span>
									</div>
                                </li>
                                <li>
									<div class="dlab-post-thum dlab-img-effect">
										<span data-exthumbimage="{{ asset('assets/frontend/images/gallery/pic8.jpg') }}" data-src="{{ asset('assets/frontend/images/gallery/pic8.jpg') }}" class="check-km" title="Image 8 Title will come here">
											<img src="{{ asset('assets/frontend/images/gallery/pic8.jpg') }}" alt="">
										</span>
									</div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_archive">
                            <h5 class="widget-title style-1">Categories List</h5>
                            <ul>
                                <li><a href="javascript:void(0);">Electronic Materials</a></li>
                                <li><a href="javascript:void(0);">Auto Parts</a></li>
                                <li><a href="javascript:void(0);">Building Management</a></li>
                                <li><a href="javascript:void(0);">Power Systems</a></li>
                                <li><a href="javascript:void(0);">Power &amp; Energy</a></li>
                            </ul>
                        </div>
						<div class="widget widget-project">
                            <h5 class="widget-title style-1">Our Project</h5>
                            <div class="widget-project-box owl-none owl-loaded owl-theme owl-carousel dots-style-1 owl-dots-black-full">
								<div class="item"><img src="{{ asset('assets/frontend/images/our-services/pic1.jpg') }}" alt=""/></div>
								<div class="item"><img src="{{ asset('assets/frontend/images/our-services/pic2.jpg') }}" alt=""/></div>
								<div class="item"><img src="{{ asset('assets/frontend/images/our-services/pic3.jpg') }}" alt=""/></div>
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