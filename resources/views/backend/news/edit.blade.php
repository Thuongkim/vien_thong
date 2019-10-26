@extends('backend.master')

@section('title')
    {!! trans('system.action.edit') !!} - {!! trans('news.label') !!}
@stop

@section('head')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/iCheck/all.css') !!}" />
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/dropzone/css/dropzone.min.css') !!}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@stop

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('news.label') !!}
            <small>{!! trans('system.action.edit') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
            <li><a href="{!! route('admin.news.index') !!}">{!! trans('news.label') !!}</a></li>
        </ol>
    </section>
    @if($errors->count())
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> {!! trans('messages.error') !!}</h4>
            <ul>
                @foreach($errors->all() as $message)
                <li>{!! $message !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('url' => route('admin.news.update', $news->id), 'method' => 'PUT', 'role' => 'form', 'files' => true )) !!}

        <table class='table borderless'>
            <tr>
                <th class="text-right" style="width: 20%;">
                    {!! trans('news.title') !!}
                </th>
                <td>
                    {!! Form::text('title', old('title', $news->title), array('class' => 'form-control', 'required', 'maxlength' => 100)) !!}
                </td>
            </tr>
            @if(isset($fields['title']))
                @foreach($languages as $language => $value)
                    <tr>
                        <th class="text-right">
                            {!! trans('news.title') !!} ({!! trans('system.' . $language) !!})
                        </th>
                        <td>
                            <?php $content = $news->translation('title', $language)->first(); ?>
                            {!! Form::text("title_{$language}", old("title_{$language}", is_null($content) ? '' : $content->content), array('class' => 'form-control', 'maxlength' => 100)) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <th class="text-right">
                    {!! trans('news.category') !!}
                </th>
                <td>
                    {!! Form::select('category', $categories, old('category', $news->category_id), ["class" => "form-control"]) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('news.summary') !!}
                </th>
                <td>
                    {!! Form::textarea('summary', old('summary', $news->summary), array('class' => 'form-control', 'rows' => 2, 'maxlength' => 255)) !!}
                </td>
            </tr>
            @if(isset($fields['summary']))
                @foreach($languages as $language => $value)
                    <tr>
                        <th class="text-right">
                            {!! trans('news.summary') !!} ({!! trans('system.' . $language) !!})
                        </th>
                        <td>
                            <?php $content = $news->translation('summary', $language)->first(); ?>
                            {!! Form::textarea("summary_{$language}", old("summary_{$language}", is_null($content) ? '' : $content->content), array('class' => 'form-control', 'rows' => 3, 'maxlength' => 255)) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <th class="text-right">{!! trans("news.image") !!}</th>
                <td>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="min-height: 250px; max-height: 250px; max-width: 370px; padding: 0px;">
                            @if($news->image)
                            <img src="{!! asset('assets/media/' . $news->image) !!}">
                            @endif
                        </div>
                        <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileupload-new">
                                    {!! trans('system.action.select_image') !!}
                                </span>
                                {!! Form::file('image') !!}
                            </span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
                                {!! trans('system.action.remove') !!}
                            </a>
                            (Kích thước 370x250)
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('news.content') !!}
                </th>
                <td>
                    {!! Form::textarea('content', old('content', $news->content), array('class' => 'form-control ckeditor', 'rows' => 25, 'id' => 'content')) !!}
                </td>
            </tr>
            @if(isset($fields['content']))
                @foreach($languages as $language => $value)
                    <tr>
                        <th class="text-right">
                            {!! trans('news.content') !!} ({!! trans('system.' . $language) !!})
                        </th>
                        <td>
                            <?php $content = $news->translation('content', $language)->first(); ?>
                            {!! Form::textarea("content_{$language}", old("content_{$language}", is_null($content) ? '' : $content->content), array('class' => 'form-control ckeditor', 'rows' => 25, 'id' => "content_{$language}")) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <td class="text-center" colspan="2">
                    {!! trans('news.featured') !!}
                    {!! Form::checkbox('featured', 1, old('featured', $news->featured), [ 'class' => 'minimal' ]) !!}
                    {!! trans('system.status.active') !!}
                    {!! Form::checkbox('status', 1, old('status', $news->status), [ 'class' => 'minimal-red' ]) !!}
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    {!! HTML::link(route( 'admin.news.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat'))!!}
                    {!! Form::submit(trans('system.action.save'), array('class' => 'btn btn-primary btn-flat')) !!}
                </td>
            </tr>
        </table>
    {!! Form::close() !!}
@stop

@section('footer')
<script src="{!! asset('assets/backend/plugins/jasny/js/bootstrap-fileupload.js') !!}"></script>
<script src="{!! asset('assets/backend/plugins/dropzone/js/dropzone.min.js') !!}"></script>
<script src="{!! asset('assets/backend/plugins/iCheck/icheck.min.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    !function ($) {
        $(function() {
            $('input[type="checkbox"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
            });

            $('input[type="checkbox"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red'
            });
        });
    }(window.jQuery);
</script>
@include('backend.plugins.ckeditor')
@stop