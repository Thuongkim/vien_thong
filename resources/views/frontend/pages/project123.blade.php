@extends('frontend.master')
@section('title'){!! trans('frontend.project') !!}@stop
@section('seo_keywords'){!! trans('frontend.project'). " " .config('app.name') !!}@stop
@section('seo_description'){!! trans('frontend.project'). " " .config('app.name') !!}@stop
@section('image'){!!  asset('assets/frontend/images/main-slider/slide1.jpg') !!}@stop
@section('content')

<!-- Content -->
<div class="page-content bg-white animation-effects">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-ptactive wow zoomIn"
        style="background-image:url({{ asset('assets/frontend/images/main-slider/abc.png') }});">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white" style="text-transform: uppercase;">{{trans('frontend.project')}}</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('home') }}">{{trans('frontend.home')}}</a></li>
                        <li>{{trans('frontend.project')}}</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner portfolio text-uppercase bg-white" id="portfolio">
        <div class="container">
            <div class="site-filters clearfix center  m-b40">
                <ul class="filters_1" data-toggle="buttons">
                    @foreach ($projectCategories as $k => $projectCategory)
                    @if($k == 0)
                    <li data-filter="project_{{ $projectCategory['id']}}" class="btn active metal">
                        <input type="radio">
                        <a href="javascript:void(0);"
                            class="site-button-secondry button-sm radius-xl"><span>{{trans('frontend.project')}} {{ $projectCategory[$lang]['name']}}</span></a>
                    </li>
                    @else
                    <li data-filter="project_{{$projectCategory['id']}}" class="btn">
                        <input type="radio">
                        <a href="javascript:void(0);"
                            class="site-button-secondry button-sm radius-xl"><span>{{trans('frontend.project')}} {{ $projectCategory[$lang]['name']}}</span></a>
                    </li>
                    @endif
                    @endforeach
                    <li data-filter="" class="btn">
                        <input type="radio">
                        <a href="javascript:void(0);"
                            class="site-button-secondry button-sm radius-xl"><span>{{trans('frontend.all')}}</span></a>
                    </li>
                </ul>
            </div>

            <div class="clearfix" id="lightgallery">
                <ul id="masonry_1" class=" portfolio-ic dlab-gallery-listing gallery-grid-4 gallery lightgallery text-center">
                @foreach ($projects as $project)
                    @if ($project[$lang]['title'])
                    <li class="project_{{ $project['category_id']}} design card-container col-lg-3 col-md-6 col-sm-6 p-a0">
                        <div class="dlab-box dlab-gallery-box">
                            @if (!$project['image'])
                            <div class="dlab-media dlab-img-overlay1 dlab-img-effect">
                                <a> <img src="https://via.placeholder.com/279x200.png?text=HTE-project" alt="">
                                </a>
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <div class="text-white">
                                            <a href="{{ route('project.show', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}"><i
                                                    class="fa fa-link icon-bx-xs"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="dlab-media dlab-img-overlay1 dlab-img-effect">
                                <a> <img src="{!! asset('assets/media/images/projects/' . $project['image']) !!}" alt="">
                                </a>
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <div class="text-white">
                                            <a href="{{ route('project.show', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}"><i
                                                    class="fa fa-link icon-bx-xs"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="dez-info p-a30 bg-white">
                                <b><p class="dez-title m-t0" style="text-transform: capitalize;">
                                    <a href="{{ route('project.show', ['slug' => str_slug($project[$lang]['title']), 'id' => $project['id']]) }}">
                                    {!! \App\Helper\HString::modSubstr($project[$lang]['title'], 45)!!}
                                    </a>
                                </p></b>
                            </div>
                        </div>
                    </li>
                    @endif
                @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->

@endsection