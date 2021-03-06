@extends('backend.master')

@section('title')
    {!! trans('system.action.edit') !!} - {!! trans('service_categories.label_categories') !!}
@stop

@section('head')
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/backend/plugins/iCheck/all.css') !!}" />
@stop

@section('content')
    <section class="content-header">
        <h1>
            {!! trans('service_categories.categories_label') !!}
            <small>{!! trans('system.action.edit') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
            <li><a href="{!! route('admin.service-categories.index') !!}">{!! trans('service_categories.categories_label') !!}</a></li>
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
    {!! Form::open(array('url' => route('admin.service-categories.update', $category->id), 'method' => 'PUT', 'role' => 'form')) !!}

        <table class='table borderless' style="width: 80%;">
            <tr>
                <th class="table_right_middle" style="width: 25%;">
                    {!! trans('services.categories.name') !!}
                </th>
                <td>
                    {!! Form::text('name', old('name', $category->name), array('class' => 'form-control', 'maxlength' => 100)) !!}
                </td>
            </tr>
            @if(isset($fields['name']))
                @foreach($languages as $language => $value)
                    <tr>
                        <th class="table_right_middle">
                            {!! trans('services.categories.name') !!} ({!! trans('system.' . $language) !!})
                        </th>
                        <td>
                            <?php $content = $category->translation('name', $language)->first(); ?>
                            {!! Form::text("name_{$language}", old("name_{$language}", is_null($content) ? '' : $content->content), array('class' => 'form-control', 'maxlength' => 50)) !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <th class="table_right_middle">
                    {!! trans('services.categories.parent') !!}
                </th>
                <td>
                    {!! Form::select('parent', ['' => trans('services.categories.parent_category')] + $categories, old('parent', $category->parent_id), ["class" => "form-control"]) !!}
                </td>
            </tr>
            <tr>
                <th class="table_right_middle">
                    {!! trans('system.status.label') !!}
                </th>
                <td>
                    {!! Form::checkbox('status', 1, old('status', $category->status), [ 'class' => 'minimal-red' ]) !!} {!! trans('system.status.active') !!}
                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-center">
                    {!! HTML::link(route( 'admin.service-categories.index' ), trans('system.action.cancel'), array('class' => 'btn btn-danger btn-flat'))!!}
                    {!! Form::submit(trans('system.action.save'), array('class' => 'btn btn-primary btn-flat')) !!}
                </td>
            </tr>
        </table>

    {!! Form::close() !!}
@stop

@section('footer')
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
@stop