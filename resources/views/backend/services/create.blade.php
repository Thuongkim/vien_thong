@extends('backend.master')
@section('title'){!! trans('system.action.create') !!} - {!! trans('services.label') !!}
@stop
@section('head')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/iCheck/all.css') !!}" />
@stop

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('services.label') !!}
            <small>{!! trans('system.action.create') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
            <li><a href="{!! route('admin.services.index') !!}">{!! trans('services.label') !!}</a></li>
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
    {!! Form::open(array('url' => route('admin.services.store'), 'role' => 'form', 'files' => true )) !!}

        <table class='table borderless'>
            <tr>
                <th class="text-right" style="width: 20%;">
                    {!! trans('services.title') !!}
                </th>
                <td>
                    {!! Form::text('title', old('title'), array('class' => 'form-control', 'required', 'maxlength' => 255)) !!}
                </td>
            </tr>
            @if(isset($fields['title']))
                @foreach($languages as $language => $value)
                    <tr>
                        <th class="text-right">
                            {!! trans('services.title') !!} ({!! trans('system.' . $language) !!})
                        </th>
                        <td>
                            {!! Form::text("title_{$language}", old("title_{$language}"), array('class' => 'form-control', 'maxlength' => 255)) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <th class="text-right">
                    {!! trans('services.category') !!}
                </th>
                <td>
                    {!! Form::select('category', ['' => trans('system.dropdown_choice')] + $categories, old('category'), ["class" => "form-control"]) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('services.summary') !!}
                </th>
                <td>
                    {!! Form::textarea('summary', old('summary'), array('class' => 'form-control', 'rows' => 3, 'required', 'maxlength' => 255)) !!}
                </td>
            </tr>
            @if(isset($fields['summary']))
                @foreach($languages as $language => $value)
                    <tr>
                        <th class="text-right">
                            {!! trans('services.summary') !!} ({!! trans('system.' . $language) !!})
                        </th>
                        <td>
                            {!! Form::textarea("summary_{$language}", old("summary_{$language}"), array('class' => 'form-control', 'rows' => 3, 'maxlength' => 255)) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <th class="text-right">
                    {!! trans('services.icon') !!}
                </th>
                <td>
                    {!! Form::text('icon', old('icon'), array('class' => 'form-control', 'required', 'maxlength' => 255)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">{!! trans("services.image") !!}</th>
                <td>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="width: {!! 300/1.5 !!}px; min-height: {!! 225/1.5 !!}px;max-height: auto; max-width: 300px;padding: 0px;">
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
                            (Kích thước 225x300)
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('services.content') !!}
                </th>
                <td colspan="3">
                    {!! Form::textarea('content', old('content'), array('class' => 'form-control ckeditor', 'rows' => 25, 'id' => 'content')) !!}
                </td>
            </tr>
            @if(isset($fields['content']))
                @foreach($languages as $language => $value)
                    <tr>
                        <th class="text-right">
                            {!! trans('services.content') !!} ({!! trans('system.' . $language) !!})
                        </th>
                        <td colspan="3">
                            {!! Form::textarea("content_{$language}", old("content_{$language}"), array('class' => 'form-control ckeditor', 'rows' => 25, 'id' => "content_{$language}")) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <td class="text-center" colspan="4">
                    {!! trans('news.featured') !!}
                    {!! Form::checkbox('featured', 1, old('featured', 1), [ 'class' => 'minimal' ]) !!}
                    {!! trans('system.status.active') !!}
                    {!! Form::checkbox('status', 1, old('status', 1), [ 'class' => 'minimal-red' ]) !!}
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">
                    {!! HTML::link(route( 'admin.services.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat'))!!}
                    &nbsp;
                    {!! Form::submit("Gửi bài", array('class' => 'btn btn-primary btn-flat')) !!}
                </td>
            </tr>
        </table>

    {!! Form::close() !!}
@stop

@section('footer')
<script src="{!! asset('assets/backend/plugins/jasny/js/bootstrap-fileupload.js') !!}"></script>
<script src="{!! asset('assets/backend/plugins/iCheck/icheck.min.js') !!}"></script>
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