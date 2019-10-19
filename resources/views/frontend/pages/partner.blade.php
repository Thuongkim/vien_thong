@extends('frontend.master')

@section('content')

<!-- Content -->
<div class="page-content bg-white">
    <!-- contact area -->
    <div class="content-area">
        <!-- Testimonials Style 16 -->
        <div class="section-full overlay-black-middle bg-img-fix content-inner"
            style="background-image:url({{ asset('assets/frontend/images/background/bg-customer.png') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sort-title text-white clearfix text-center">
                            <h4>Đối tác của chúng tôi</h4>
                        </div>
                        <div class="section-content">
                            <div class="testimonial-four owl-loaded owl-theme owl-carousel owl-none">
                                @foreach ($partners as $partner)
                                <div class="item">
                                    <div class="testimonial-4 testimonial-bg">
                                        <div class="testimonial-pic"><img src="{!! asset('assets/media/images/partners/' . $partner['image']) !!}"
                                                style="width: 100%;height: auto;" alt=""></div>
                                        <div class="testimonial-text">
                                            <p style="min-height: 85px;">{{$partner['slogan']}}</p>
                                        </div>
                                        <div class="testimonial-detail"> <strong
                                                class="testimonial-name">{{$partner['name']}}</strong> <span
                                                class="testimonial-position">Đối tác</span> </div>
                                        <div class="quote-right"></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonials Style 16 End -->
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->

@endsection