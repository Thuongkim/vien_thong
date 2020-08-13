@extends('backend.master')

@section('title')
    {!! trans('system.action.edit') !!} - {!! trans('partners.label') !!}
@stop

@section('head')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/iCheck/all.css') !!}" />
@stop

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('partners.label') !!}
            <small>{!! trans('system.action.edit') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
            <li><a href="{!! route('admin.partners.index') !!}">{!! trans('partners.label') !!}</a></li>
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
    {!! Form::open(array('url' => route('admin.partners.update', $partner->id), 'method' => 'PUT', 'role' => 'form', 'files' => true )) !!}

        <table class='table borderless' style="width: 80%;">
            <tr>
                <th class="text-right">
                    {!! trans('partners.name') !!}
                </th>
                <td>
                    {!! Form::text('name', old('name', $partner->name), array('class' => 'form-control', 'required', 'maxlength' => 50)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('partners.slogan') !!}
                </th>
                <td>
                    {!! Form::text('slogan', old('slogan', $partner->slogan), array('class' => 'form-control', 'maxlength' => 100)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">
                    {!! trans('partners.partner_link') !!}
                </th>
                <td>
                    {!! Form::text('partner_link', old('partner_link', $partner->partner_link), array('class' => 'form-control', 'required', 'maxlength' => 255)) !!}
                </td>
            </tr>
            <tr>
                <th class="text-right">{!! trans("partners.image") !!}</th>
                <td>
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail" style="min-height: 200px; max-height: auto; max-width: 350px;">
                            @if($partner->image)
                            <img src="{!! asset('assets/media/images/partners/' . $partner->image) !!}">
                            @endif
                        </div>
                        <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileupload-new">
                                    {!! trans('system.action.select_image') !!}
                                </span>
                                {!! Form::file('image', $attributes = ['accept'=>"image/x-png,image/gif,image/jpeg"]) !!}
                            </span>
                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">
                                {!! trans('system.action.remove') !!}
                            </a>
                            (Kích thước 350x350)
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    {!! trans('system.status.active') !!}
                    {!! Form::checkbox('status', 1, old('status', $partner->status), [ 'class' => 'minimal-red' ]) !!}
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    {!! HTML::link(route( 'admin.partners.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat')) !!}
                    &nbsp;
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
<script>
    !function ($) {
        $(function() {
            $('input[type="checkbox"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red'
            });
        });
    }(window.jQuery);
</script>
@stop