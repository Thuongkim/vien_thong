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
					
					<article id="post-1256" class="post-1256 post type-post status-publish format-standard has-post-thumbnail hentry category-su-kien category-tin-tuc">
						<div class="entry-thumbnail">
							<img width="150" height="150" src="https://hte.vn/wp-content/uploads/2019/07/1-2-e1562297158762-150x150.jpg" class="attachment-thumbnail wp-post-image" alt="1 (2)"> </div>

							<header class="entry-header">

								<h2 class="entry-title">
									<a href="https://hte.vn/together-everyone-achieves-more/" rel="bookmark">Together Everyone Achieves More</a>
								</h2>
								<div class="entry-meta">
									<ul>
										<li class="date"><i class="icon icon-time"></i>&nbsp;04/07/2019</li>
									</ul>
								</div>
								<!--/.entry-meta -->
							</header>
							<!--/.entry-header -->
							<div class="entry-content">
								<p style="text-align: left;"><span class=" _2iem">TEAMBUILDING 2019 – TRUNG TÂM KỸ THUẬT MIỀN BẮC<br>
								Team buiding là hoạt động vô cùng cần thiết để xây dựng tinh thần đoàn kết, gắn kết các cá nhân, bộ phận, phòng ban trong công ty. Together Everyone Achieve More – Mọi người cùng nhau đóng góp để gặt hái nhiều hơn </span></p>
								<button type=""><a href="https://hte.vn/together-everyone-achieves-more/#more-1256" class="more-link">Xem Tiếp</a></button>
							</div>

							<footer>
							</footer>

						</article>

					</div>
				</div>

			</div>
		</div>
	</div>



	@endsection