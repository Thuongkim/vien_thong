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
    <!-- contact area -->
    <div class="content-area">
        <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-lg-9">
                    <div class="blog-post blog-md clearfix wow bounceInDown fly-box-ho" data-wow-delay="0.3s">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="https://industry.dexignzone.com/xhtml/images/blog/grid/pic1.jpg" alt=""></a>
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-date"> <strong>17 Aug</strong> <span> 2016</span> </li>
                                    <li class="post-author"> By <a href="javascript:void(0);">Oliver</a> </li>
                                </ul>
                            </div>
							<div class="dlab-post-title">
                                <h4 class="post-title"><a href="blog-single.html">Why Are Children So Obsessed</a></h4>
                            </div>
                            <div class="dlab-post-text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy
                                    text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="dlab-post-readmore">
								<a href="blog-single.html" title="READ MORE" rel="bookmark" class="site-button">READ MORE
									<i class="ti-arrow-right"></i>
								</a>
							</div>
						</div>
                    </div>
                    <div class="blog-post blog-md clearfix  wow bounceOut fly-box-ho" data-wow-delay="0.6s">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="https://industry.dexignzone.com/xhtml/images/blog/grid/pic2.jpg" alt=""></a>
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-date"> <strong>16 Aug</strong> <span> 2016</span> </li>
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
                    <div class="blog-post blog-md clearfix  wow bounceOutDown fly-box-ho" data-wow-delay="0.3s">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="https://industry.dexignzone.com/xhtml/images/blog/grid/pic3.jpg" alt=""></a>
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-date"> <strong>15 Aug</strong> <span> 2016</span> </li>
                                    <li class="post-author"> By <a href="javascript:void(0);">Aaron</a> </li>
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
                    <div class="blog-post blog-md clearfix  wow bounceInDown fly-box-ho" data-wow-delay="0.6s">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="https://industry.dexignzone.com/xhtml/images/blog/grid/pic1.jpg" alt=""></a>
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-date"> <strong>14 Aug</strong> <span> 2016</span> </li>
                                    <li class="post-author"> By <a href="javascript:void(0);">Jamie</a> </li>
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
                    <div class="blog-post blog-md clearfix  wow BOUNCEOUTUP fly-box-ho" data-wow-delay="0.3s">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="https://industry.dexignzone.com/xhtml/images/blog/grid/pic2.jpg" alt=""></a>
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta ">
                                <ul>
                                    <li class="post-date"> <strong>13 Aug</strong> <span> 2016</span> </li>
                                    <li class="post-author"> By <a href="javascript:void(0);">Winnie </a> </li>
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
                    <div class="blog-post blog-md clearfix  wow bounceInDown fly-box-ho" data-wow-delay="0.6s">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="https://industry.dexignzone.com/xhtml/images/blog/grid/pic3.jpg" alt=""></a>
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-date"> <strong>12 Aug</strong> <span> 2016</span> </li>
                                    <li class="post-author">By <a href="javascript:void(0);">Anna</a> </li>
                                </ul>
                            </div>
							<div class="dlab-post-title ">
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
                    <div class="blog-post blog-md clearfix  wow bounceInDown fly-box-ho" data-wow-delay="0.3s">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="https://industry.dexignzone.com/xhtml/images/blog/grid/pic2.jpg" alt=""></a>
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-date"> <strong>11 Aug</strong> <span> 2016</span> </li>
                                    <li class="post-author"> By <a href="javascript:void(0);">Thomas</a> </li>
                                </ul>
                            </div>
							<div class="dlab-post-title">
                                <h4 class="post-title"><a href="blog-single.html">The Shocking Revelation of Industry</a></h4>
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
                    <div class="blog-post blog-md clearfix  wow bounceInDown fly-box-ho" data-wow-delay="0.6s">
                        <div class="dlab-post-media dlab-img-effect zoom-slow">
							<a href="blog-single.html"><img src="https://industry.dexignzone.com/xhtml/images/blog/grid/pic1.jpg" alt=""></a>
						</div>
                        <div class="dlab-post-info">
                            <div class="dlab-post-meta">
                                <ul>
                                    <li class="post-date"> <strong>10 Aug</strong> <span> 2016</span> </li>
                                    <li class="post-author"> By <a href="javascript:void(0);">Lucinda</a> </li>
                                </ul>
                            </div>
							<div class="dlab-post-title">
                                <h4 class="post-title"><a href="blog-single.html">Why You Should Not Go To Industry</a></h4>
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
					<div class="pagination-bx clearfix text-center">
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
                <!-- Side bar start -->
                <div class="col-lg-3">
                    <aside  class="side-bar sticky-top">
                        {{-- <div class="widget">
                            <h5 class="widget-title style-1">Search</h5>
                            <div class="search-bx style-1">
                                <form role="search" method="post">
                                    <div class="input-group">
                                        <input name="text" class="form-control" placeholder="Enter your keywords..." type="text">
                                        <span class="input-group-btn">
                                            <button type="submit" class="fa fa-search text-primary"></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        <div class="widget recent-posts-entry  wow bounceInDown fly-box-ho" data-wow-delay="0.1s">
                            <h5 class="widget-title style-1">Bài viết gần đây</h5>
                            <div class="widget-post-bx">
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media">
                                        <img src="https://industry.dexignzone.com/xhtml/images/blog/recent-blog/pic1.jpg" width="200" height="143" alt="">
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
                                        <img src="https://industry.dexignzone.com/xhtml/images/blog/recent-blog/pic2.jpg" width="200" height="160" alt="">
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
                                        <img src="https://industry.dexignzone.com/xhtml/images/blog/recent-blog/pic3.jpg" width="200" height="160" alt="">
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
                        {{-- <div class="widget widget-newslatter">
                            <h5 class="widget-title style-1">Newsletter</h5>
                            <div class="news-box">
                                <p>Enter your e-mail and subscribe to our newsletter.</p>
                                <form class="dzSubscribe" action="script/mailchamp.php" method="post">
                                    <div class="dzSubscribeMsg"></div>
                                    <div class="input-group">
                                        <input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email"/>
                                        <button name="submit" value="Submit" type="submit" class="site-button btn-block radius-no">Subscribe Now</button>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        {{-- <div class="widget widget_gallery gallery-grid-4">
                            <h5 class="widget-title style-1">Our Gallery</h5>
                            <ul id="lightgallery" class="lightgallery">
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="https://industry.dexignzone.com/xhtml/images/gallery/pic1.jpg" data-src="https://industry.dexignzone.com/xhtml/images/gallery/pic1.jpg" class="check-km" title="Image 1 Title will come here">
                                            <img src="https://industry.dexignzone.com/xhtml/images/gallery/pic1.jpg" alt="">
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="https://industry.dexignzone.com/xhtml/images/gallery/pic2.jpg" data-src="https://industry.dexignzone.com/xhtml/images/gallery/pic2.jpg" class="check-km" title="Image 2 Title will come here">
                                            <img src="https://industry.dexignzone.com/xhtml/images/gallery/pic2.jpg" alt="">
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="https://industry.dexignzone.com/xhtml/images/gallery/pic3.jpg" data-src="https://industry.dexignzone.com/xhtml/images/gallery/pic3.jpg" class="check-km" title="Image 3 Title will come here">
                                            <img src="https://industry.dexignzone.com/xhtml/images/gallery/pic3.jpg" alt="">
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="https://industry.dexignzone.com/xhtml/images/gallery/pic4.jpg" data-src="https://industry.dexignzone.com/xhtml/images/gallery/pic4.jpg" class="check-km" title="Image 4 Title will come here">
                                            <img src="https://industry.dexignzone.com/xhtml/images/gallery/pic4.jpg" alt="">
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="https://industry.dexignzone.com/xhtml/images/gallery/pic5.jpg" data-src="https://industry.dexignzone.com/xhtml/images/gallery/pic5.jpg" class="check-km" title="Image 5 Title will come here">
                                            <img src="https://industry.dexignzone.com/xhtml/images/gallery/pic5.jpg" alt="">
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="https://industry.dexignzone.com/xhtml/images/gallery/pic6.jpg" data-src="images/gallery/pic6.jpg" class="check-km" title="Image 6 Title will come here">
                                            <img src="https://industry.dexignzone.com/xhtml/images/gallery/pic6.jpg" alt="">
                                        </span>
                                    </div>
                                </li>
                                 <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="https://industry.dexignzone.com/xhtml/images/gallery/pic7.jpg" data-src="https://industry.dexignzone.com/xhtml/images/gallery/pic7.jpg" class="check-km" title="Image 7 Title will come here">
                                            <img src="https://industry.dexignzone.com/xhtml/images/gallery/pic7.jpg" alt="">
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="dlab-post-thum dlab-img-effect">
                                        <span data-exthumbimage="https://industry.dexignzone.com/xhtml/images/gallery/pic8.jpg" data-src="https://industry.dexignzone.com/xhtml/images/gallery/pic8.jpg" class="check-km" title="Image 8 Title will come here">
                                            <img src="https://industry.dexignzone.com/xhtml/images/gallery/pic8.jpg" alt="">
                                        </span>
                                    </div>
                                </li>
                            </ul>
                        </div> --}}
                        <div class="widget widget_archive">
                            <h5 class="widget-title style-1">Danh mục tin</h5>
                            <ul>
                                <li><a href="javascript:void(0);">Tin Tức</a></li>
                                <li><a href="javascript:void(0);">Tuyển dụng</a></li>
                                {{-- <li><a href="javascript:void(0);">Building Management</a></li>
                                <li><a href="javascript:void(0);">Power Systems</a></li>
                                <li><a href="javascript:void(0);">Power & Energy</a></li> --}}
                            </ul>
                        </div>
                        <div class="widget widget-project">
                            <h5 class="widget-title style-1">Dự án nổi bật</h5>
                            <div class="widget-project-box owl-none owl-loaded owl-theme owl-carousel dots-style-1 owl-dots-black-full">
                                <div class="item"><img src="https://industry.dexignzone.com/xhtml/images/our-services/pic1.jpg" alt=""/></div>
                                <div class="item"><img src="https://industry.dexignzone.com/xhtml/images/our-services/pic2.jpg" alt=""/></div>
                                <div class="item"><img src="https://industry.dexignzone.com/xhtml/images/our-services/pic3.jpg" alt=""/></div>
                            </div>
                        </div>
                        {{-- <div class="widget widget_tag_cloud radius">
                            <h5 class="widget-title style-1">Tags</h5>
                            <div class="tagcloud">
                                <a href="javascript:void(0);">Design</a>
                                <a href="javascript:void(0);">User interface</a>
                                <a href="javascript:void(0);">SEO</a>
                                <a href="javascript:void(0);">WordPress</a>
                                <a href="javascript:void(0);">Development</a>
                                <a href="javascript:void(0);">Joomla</a>
                                <a href="javascript:void(0);">Design</a>
                                <a href="javascript:void(0);">User interface</a>
                                <a href="javascript:void(0);">SEO</a>
                                <a href="javascript:void(0);">WordPress</a>
                                <a href="javascript:void(0);">Development</a>
                                <a href="javascript:void(0);">Joomla</a>
                                <a href="javascript:void(0);">Design</a>
                                <a href="javascript:void(0);">User interface</a>
                                <a href="javascript:void(0);">SEO</a>
                                <a href="javascript:void(0);">WordPress</a>
                                <a href="javascript:void(0);">Development</a>
                                <a href="javascript:void(0);">Joomla</a>
                            </div>
                        </div> --}}
                    </aside>
                </div>
                <!-- Side bar END -->
            </div>
        </div>
    </div>
</div>
<!-- Left & right section END -->
<!-- Content END-->
@endsection
