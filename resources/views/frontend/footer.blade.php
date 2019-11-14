<footer class="site-footer">
	<div class="footer-top" style="background-image:url({{ asset('assets/frontend/images/background/bg3.png') }}); background-size: contain; padding: 15px">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xl-3 col-lg-3 col-sm-6 footer-col-4">
					<div class="widget widget_getintuch">
						{!! isset($staticPages[$lang]['footer-left']['description']) ? $staticPages[$lang]['footer-left']['description'] : '' !!}
					</div>
				</div>
				<div class="col-md-3 col-xl-3 col-lg-3 col-sm-6 footer-col-4">
					<div class="widget widget_getintuch">
						{!! isset($staticPages[$lang]['footer-left1']['description']) ? $staticPages[$lang]['footer-left1']['description'] : '' !!}
					</div>
				</div>
				<div class="col-md-3 col-xl-3 col-lg-3 col-sm-6 footer-col-4">
					<div class="widget widget_getintuch">
						{!! isset($staticPages[$lang]['footer-left2']['description']) ? $staticPages[$lang]['footer-left2']['description'] : '' !!}
					</div>
				</div>
				<div class="col-md-3 col-xl-3 col-lg-3 col-sm-6 footer-col-4">
					<div class="widget widget_getintuch">
						{!! isset($staticPages[$lang]['footer-right']['description']) ? $staticPages[$lang]['footer-right']['description'] : '' !!}
					</div>
				</div>
				<div class="col-md-12 footer-col-12" style="height: 40px;">
					<div class="widget" align="right">
						<ul class="list-inline m-a0">
							<li><a href="{!! isset($staticPages[$lang]['fb']['description']) ? $staticPages[$lang]['fb']['description'] : '' !!}" class="site-button facebook circle "><i
								class="fa fa-facebook"></i></a></li>
									<li><a href="{!! isset($staticPages[$lang]['link']['description']) ? $staticPages[$lang]['link']['description'] : '' !!}" class="site-button linkedin circle "><i
										class="fa fa-linkedin"></i></a></li>
											<li><a href="{!! isset($staticPages[$lang]['youtube']['description']) ? $staticPages[$lang]['youtube']['description'] : '' !!}" class="site-button youtube circle "><i
												class="fa fa-youtube"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- footer bottom part -->
						<div class="footer-bottom">
							<div class="container">
								<div class="row">
									<div class="col-md-6 col-sm-6 text-left "> 
										<span>{!! isset($staticPages[$lang]['company']['description']) ? $staticPages[$lang]['company']['description'] : '' !!}</span>					
									</div>
								</div>
							</div>
						</div>
					</footer>