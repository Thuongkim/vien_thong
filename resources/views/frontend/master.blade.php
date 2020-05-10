<!DOCTYPE html>
<html lang="en">
<?php $appName = isset($staticPages['website-title']['description']) ? $staticPages['website-title']['description'] : env('APP_NAME'); ?>
<head>
	<!-- PAGE TITLE HERE -->
	<title>@yield('title') | ITE.,JSC</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:url" content="{!! url()->full() !!}">
    <meta property="fb:app_id" content="1081710445331564">
    <meta property="og:description" content="@yield('seo_description')">
    <meta property="og:site_name" content="{!! env("APP_NAME") !!}">
    <meta property="og:type" content="product">
    <meta name="twitter:site" content="{!! env("APP_NAME") !!}">
    <meta name="twitter:title" content="@yield('title')">
    <meta name="twitter:description" content="@yield('seo_description')">
    <meta name="twitter:creator" content="{!! env("APP_NAME") !!}">
    <meta name="twitter:card" content="photo">
    <meta name="twitter:url" content="{!! url()->full() !!}">
    <link rel="canonical" href="{!! route('home') !!}">
    <meta name="author" content="{!! env("APP_NAME") !!}" />
    <meta name="keywords" content="@yield('seo_keywords')" />
    <meta name="description" content="@yield('seo_description')" />
    <meta name="copyright" content="" />
    <link rel="icon" href="{{ asset('assets/frontend/images/hte-logo.png') }}" type="image/x-icon" />



	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/plugins.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/plugins/fontawesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/plugins/line-awesome/css/line-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/plugins/flaticon/flaticon.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/plugins/themify/themify-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style.min.css') }}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/skin/skin-2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/templete.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/style.css') }}">
	<link rel="stylesheet" type="" href="{{ asset('assets/frontend/plugins/revolution/revolution/fonts/revicons/revicons.woff') }}">
	<!-- Google Font -->
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap');
	</style>

	<!-- REVOLUTION SLIDER CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/plugins/revolution/revolution/css/revolution.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/fix.css') }}">
	<!-- SEARCH -->
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/search.css') }}"> --}}

</head>

<body id="bg">
	<div class="page-wraper">
		<div id="loading-area" :style="spinnerStyle">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div>
		{{-- <div class="hollow-dots-spinner" :style="spinnerStyle">
			<div class="dot"></div>
			<div class="dot"></div>
			<div class="dot"></div>
		</div> --}}
		<!-- header -->
		@include('frontend.menu')
		<!-- header END -->
		<!-- Content -->
		@yield('content')
	<!-- Content END -->
	<!-- Footer -->
	@include('frontend.footer')
	<!-- Footer END-->
	<button class="scroltop style1 white icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
	</div>
	<!-- JAVASCRIPT FILES ========================================= -->
	<script src="{{ asset('assets/frontend/welcome/js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
	<script src="{{ asset('assets/frontend/welcome/js/custom.js') }}"></script><!-- CUSTOM FUCTIONS  -->
	<script src="{{ asset('assets/frontend/js/combining.js') }}"></script><!-- CONTACT JS  -->
	<script src="{{ asset('assets/frontend/js/jquery.lazy.min.js') }}"></script>
	<!-- REVOLUTION JS FILES -->

	<script src="{{ asset('assets/frontend/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>

	<script type="text/javascript"
		src="{{ asset('assets/frontend/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
	<script type="text/javascript"
		src="{{ asset('assets/frontend/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
	<script type="text/javascript"
		src="{{ asset('assets/frontend/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
	<script type="text/javascript"
		src="{{ asset('assets/frontend/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
	<script type="text/javascript"
		src="{{ asset('assets/frontend/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
	<script type="text/javascript"
		src="{{ asset('assets/frontend/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>

	<script src="{{ asset('assets/frontend/js/rev.slider.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
	<script>
		jQuery(document).ready(function () {
			'use strict';
			dz_rev_slider_1();
			$('.lazy').Lazy();
		});	/*ready*/
	</script>
	<script>
		$(document).ready(function () {

			var sync1 = $("#sync1");
			var sync2 = $("#sync2");
			var slidesPerPage = 4; //globaly define number of elements per page
			var syncedSecondary = true;

			sync1.owlCarousel({
				items: 1,
				nav: true,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: 3000,
				dots: false,
				loop: true,
				responsiveRefreshRate: 200,
				navText: ['<i class="la la-angle-left"></i>', '<i class="la la-angle-right"></i>'],
			}).on('changed.owl.carousel', syncPosition);

			sync2.on('initialized.owl.carousel', function () {
				sync2.find(".owl-item").eq(0).addClass("current");
			}).owlCarousel({
				items: slidesPerPage,
				dots: false,
				nav: false,
				margin: 20,
				autoplaySpeed: 3000,
				navSpeed: 3000,
				paginationSpeed: 3000,
				slideSpeed: 3000,
				smartSpeed: 3000,
				autoplay: 3000,
				slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
				responsiveRefreshRate: 100,
				responsive: {
					0: {
						items: 2
					},
					480: {
						items: 2
					},
					768: {
						items: 3
					},
					1024: {
						items: 4
					},
					1400: {
						items: 4
					}
				}
			}).on('changed.owl.carousel', syncPosition2);

			function syncPosition(el) {
				//if you set loop to false, you have to restore this next line
				//var current = el.item.index;

				//if you disable loop you have to comment this block
				var count = el.item.count - 1;
				var current = Math.round(el.item.index - (el.item.count / 2) - .5);

				if (current < 0) {
					current = count;
				}
				if (current > count) {
					current = 0;
				}

				//end block

				sync2
					.find(".owl-item")
					.removeClass("current")
					.eq(current)
					.addClass("current");
				var onscreen = sync2.find('.owl-item.active').length - 1;
				var start = sync2.find('.owl-item.active').first().index();
				var end = sync2.find('.owl-item.active').last().index();

				if (current > end) {
					sync2.data('owl.carousel').to(current, 100, true);
				}
				if (current < start) {
					sync2.data('owl.carousel').to(current - onscreen, 100, true);
				}
			}

			function syncPosition2(el) {
				if (syncedSecondary) {
					var number = el.item.index;
					sync1.data('owl.carousel').to(number, 100, true);
				}
			}

			sync2.on("click", ".owl-item", function (e) {
				e.preventDefault();
				var number = $(this).index();
				//sync1.data('owl.carousel').to(number, 300, true);

				sync1.data('owl.carousel').to(number, 300, true);

			});
		});
	</script>
	<script>
		// // Get the container element
		// var btnContainer = document.getElementById("navbarNavDropdown");

		// // Get all buttons with class="btn" inside the container
		// var btns = btnContainer.getElementsByClassName("menu-hover");

		// // Loop through the buttons and add the active class to the current/clicked button
		// for (var i = 0; i < btns.length; i++) {
		//   btns[i].addEventListener("mouseover", function() {
		//     var current = document.getElementsByClassName("active");
		//     current[0].className = current[0].className.replace(" active", "");
		//     this.className += " active";
		//   });
		// }

		// jQuery(document).ready(function( $ ){
	 //        var retrievedClassName = localStorage.getItem('activeClass');
	 //        if(retrievedClassName == "active"){
	 //          // console.log($(this));
	 //        }
	 //        $(".menu-hover").bind('mouseover', function () {
	 //          $(".menu-hover").removeClass("active");
	 //          $(this).addClass("active");
	 //          localStorage.setItem('activeClass', "active");
	 //        });
	 //    });
		$(document).ready(function () {

            $(".menu-hover").click(function () {
                var id = $(this);

                $(".menu-hover").removeClass("active");
                $(id).addClass("active");
                sessionStorage.setItem("selectedolditem", $(id).text());

            });

            var selectedolditem = sessionStorage.getItem('selectedolditem');

            if (selectedolditem !== null && $(".menu-hover:contains('" + selectedolditem + "')").length) {
            	$(".menu-hover").removeClass("active");
                $(".menu-hover:contains('" + selectedolditem + "')").addClass("active");
            }
        });
	</script>
</body>

</html>
