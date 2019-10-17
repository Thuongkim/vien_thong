@extends('frontend.master')

@section('content')

<div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{ asset('assets/frontend/images/main-slider/slide1.jpg') }});">
	<div class="container">
		<div class="dlab-bnr-inr-entry">
			<h1 class="text-white">Tìm kiếm</h1>
			<!-- Breadcrumb row -->
			<div class="breadcrumb-row">
				<ul class="list-inline">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li>Tìm Kiếm</li>
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
					@foreach($items as $item)
					<?php $cat = $item->category()->first(); if (is_null($cat)) continue; ?>
					<article id="post-1256" class="post-1256 post type-post status-publish format-standard has-post-thumbnail hentry category-su-kien category-tin-tuc">
						<div class="entry-thumbnail">
							<img width="150" height="150" src="{{ asset($item->image) }}" class="attachment-thumbnail wp-post-image" alt="Hình ảnh"> </div>

							<header class="entry-header">

								<h2 class="entry-title">
									<a href="" rel="bookmark">{{ $item->title }}</a>
								</h2>
								<div class="entry-meta">
									<ul>
										<li class="date"><i class="icon icon-time"></i>&nbsp;{!! \App\Helper\HString::timeElapsedString(strtotime($item->updated_at)) !!}</li>
									</ul>
								</div>
								<!--/.entry-meta -->
							</header>
							<!--/.entry-header -->
							<div class="entry-content">
								<p style="text-align: left;">{!! $item->summary !!}</p>
							</div>
							<div class="dlab-post-readmore">
								<a href="" title="READ MORE" rel="bookmark"
									class="site-button">READ MORE
									<i class="ti-arrow-right"></i>
								</a>
							</div>
							<footer>
							</footer>

						</article>
					@endforeach
					{!! $news->links("frontend.pagination_long") !!}
					</div>
				</div>

			</div>
		</div>
	</div>



	@endsection