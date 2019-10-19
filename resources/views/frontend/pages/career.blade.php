@extends('frontend.master')

@section('content')

<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt"
        style="background-image:url({{ asset('assets/frontend/images/main-slider/slide1.jpg') }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Tuyển dụng</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Tuyển dụng</li>
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
                    <div class="dlab-accordion faq-1 box-sort-in m-b30" id="accordion1">
                    	@foreach ($news as $news)
                        <div class="panel">
                            <div class="acod-head">
                                <h6 class="acod-title">
                                    <a href="javascript:void(0);" data-toggle="collapse" data-target="<?php echo "#faq".$news->id ?>"
                                        class="collapsed" aria-expanded="true">
                                        {{ $news->translation('title', $lang)->first()->content }}
                                    </a>
                                </h6>
                            </div>
                            <div id="faq{{$news->id}}" class="acod-body collapse" data-parent="#accordion1">
                                <div class="acod-content">
                                	{!! $news->translation('content', $lang)->first()->content !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Pagination start -->
                    <div class="pagination-bx clearfix text-center">
                        <ul class="pagination">
                            <li class="previous"><a href="javascript:void(0);"><i class="ti-arrow-left"></i>
                                    Prev</a></li>
                            <li class="active"><a href="javascript:void(0);">1</a></li>
                            <li><a href="javascript:void(0);">2</a></li>
                            <li><a href="javascript:void(0);">3</a></li>
                            <li class="next"><a href="javascript:void(0);">Next <i
                                        class="ti-arrow-right"></i></a></li>
                        </ul>
                    </div>
                    <!-- Pagination END -->
                </div>
                <!-- Left part END -->
                <!-- Side bar start -->
                <div class="col-xl-3 col-lg-4 col-md-5 sticky-top">
                    <aside class="side-bar">
                        <div class="widget">
                            <h5 class="widget-title style-1">Search</h5>
                            <div class="search-bx style-1">
                                <form role="search" method="post">
                                    <div class="input-group">
                                        <input name="text" class="form-control"
                                            placeholder="Enter your keywords..." type="text">
                                        <span class="input-group-btn">
                                            <button type="submit" class="fa fa-search text-primary"></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget recent-posts-entry">
                            <h5 class="widget-title style-1">BÀI VIẾT GẦN ĐÂY</h5>
                           <div class="widget-post-bx">
								@foreach ($news_all as $news_all)
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