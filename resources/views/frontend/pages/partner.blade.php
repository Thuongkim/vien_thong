@extends('frontend.master')
@section('title'){!! trans('frontend.partner') !!}@stop
@section('seo_keywords'){!! trans('frontend.partner'). " " .config('app.name') !!}@stop
@section('seo_description'){!! trans('frontend.partner'). " " .config('app.name') !!}@stop
@section('image'){!!  asset('assets/frontend/images/main-slider/slide1.jpg') !!}@stop

@section('content')

<!-- Content -->
<div class="page-content bg-white">
    <!-- contact area -->
    <div class="content-area">
        <!-- Testimonials Style 16 -->
        <div class="section-full overlay-black-middle bg-img-fix content-inner"
            style="background-image:url({{ asset('assets/frontend/images/main-slider/abc.png') }});">
            <div class="container">
                <div class="row animation-effects">
                    <div class="col-lg-12 active wow zoomIn">
                        <div class="sort-title text-white clearfix text-center">
                            <h4>{{trans('frontend.partner_us')}}</h4>
                        </div>
                        <div class="section-content">
                            <div class="testimonial-four owl-loaded owl-theme owl-carousel owl-none"> 
                                @foreach ($partners as $partner)
                                <div class="item">
                                    <div class="testimonial-4 testimonial-bg">
                                        <div class="testimonial-pic" style="width: 100px;">
                                            <a href="{{ $partner['partner_link'] }}"><img src="{!! asset('assets/media/images/partners/' . $partner['image']) !!}"
                                                style="width: 100%;height: auto;" alt=""></a>
                                        </div>
                                        <div class="testimonial-text">
                                            <p style="min-height: 85px;">{{$partner['slogan']}}</p>
                                        </div>
                                        <a href="{{ $partner['partner_link'] }}"><div class="testimonial-detail"> 
                                            <span class="testimonial-position"><strong class="testimonial-name">{{$partner['name']}}</strong></span>
                                            <span class="testimonial-position">{{trans('frontend.partner')}}</span> 
                                        </div></a>
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