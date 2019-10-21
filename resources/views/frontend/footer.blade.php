<footer class="site-footer">
	<div class="footer-top" style="background-image:url(images/background/bg3.png); background-size: contain;">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xl-3 col-lg-3 col-sm-6 footer-col-4">
					{!! isset($staticPages[$lang]['footer-left']['description']) ? $staticPages[$lang]['footer-left']['description'] : '' !!}
				</div>
				<div class="col-md-3 col-xl-3 col-lg-3 col-sm-6 footer-col-4">
					{!! isset($staticPages[$lang]['footer-left1']['description']) ? $staticPages[$lang]['footer-left1']['description'] : '' !!}
				</div>
				<div class="col-md-3 col-xl-3 col-lg-3 col-sm-6 footer-col-4">
					{!! isset($staticPages[$lang]['footer-left2']['description']) ? $staticPages[$lang]['footer-left2']['description'] : '' !!}
				</div>
				<div class="col-md-3 col-xl-3 col-lg-3 col-sm-6 footer-col-4">
					{!! isset($staticPages[$lang]['footer-right']['description']) ? $staticPages[$lang]['footer-right']['description'] : '' !!}
				</div>
				<div class="col-md-12 footer-col-12">
					<div class="widget" align="right">
						<ul class="list-inline m-a0">
							<li><a href="{!! isset($staticPages[$lang]['fb']['description']) ? $staticPages[$lang]['fb']['description'] : '' !!}" class="site-button facebook circle "><i
								class="fa fa-facebook"></i></a></li>
								<li><a href="{!! isset($staticPages[$lang]['gg']['description']) ? $staticPages[$lang]['gg']['description'] : '' !!}" class="site-button google-plus circle "><i
									class="fa fa-google-plus"></i></a></li>
									<li><a href="{!! isset($staticPages[$lang]['link']['description']) ? $staticPages[$lang]['link']['description'] : '' !!}" class="site-button linkedin circle "><i
										class="fa fa-linkedin"></i></a></li>
										<li><a href="{!! isset($staticPages[$lang]['ins']['description']) ? $staticPages[$lang]['ins']['description'] : '' !!}" class="site-button instagram circle "><i
											class="fa fa-instagram"></i></a></li>
											<li><a href="{!! isset($staticPages[$lang]['tw']['description']) ? $staticPages[$lang]['tw']['description'] : '' !!}" class="site-button twitter circle "><i
												class="fa fa-twitter"></i></a></li>
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
									{!! isset($staticPages[$lang]['company']['description']) ? $staticPages[$lang]['company']['description'] : '' !!}
								</div>
							</div>
						</div>
					</footer>