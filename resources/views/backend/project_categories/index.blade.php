@extends('backend.master')

@section('title')
    {!! trans('system.action.list-nd') !!} {!! trans('projects.label') !!}
@stop

@section('content')

<section class="content-header">
    <h1>
        {!! trans('projects.label') !!}
        <small>{!! trans('system.action.list-nd') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
        <li><a href="{!! route('admin.projects.index') !!}">{!! trans('projects.label') !!}</a></li>
    </ol>
</section>

<section class="content overlay">
    <div class="row">
        <div class="col-md-2" style='float: left;'>
            <a href="{!! route('admin.project-categories.create') !!}" class='btn btn-primary btn-flat'>
                <span class="glyphicon glyphicon-plus"></span>&nbsp;{!! trans('system.action.create') !!}
            </a>
        </div>
        <div class="col-md-10">
            <span  style='float: right;'>

            </span>
        </div>
    </div>
    @if (count($categories) > 0)

    <div class="box">
        <div class="box-body no-padding">
            <table class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('projects.categories.name') !!} </th>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('system.status.label') !!} </th>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('system.updated_at') !!} </th>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('system.action.label') !!} </th>
                    </tr>
                </thead>
                <tbody class="borderless">
                    @foreach ($categories as $category)
                        <tr>
                            <td  style="text-align: left; vertical-align: middle;">
                                {!! $category->name !!}
                            </td>
                            <td style="text-align: center; vertical-align: middle;" style="text-align: center;">
                                @if($category->status == 0)
                                <span class="label label-danger"><span class='glyphicon glyphicon-remove'></span></span>
                                @elseif($category->status == 1)
                                <span class="label label-success"><span class='glyphicon glyphicon-ok'></span></span>
                                @endif
                            </td>
                            <td style="text-align: center; vertical-align: middle;">{!! date("d-m-Y", strtotime($category->updated_at)) !!}</td>
                            <td style="text-align: center; vertical-align: middle;">
                                @if( $category->is_system == 0 )
                                <a href="{!! route('admin.project-categories.edit', $category->id) !!}" class="btn-edit edit text-warning">
                                    <i class="glyphicon glyphicon-edit"></i>
                                    {!! trans('system.action.edit') !!}
                                </a>
                                &nbsp;
                                <a href="{!! route('admin.project-categories.delete', $category->id) !!}" class="btn-confirm text-danger">
                                    <i class="glyphicon glyphicon-remove"></i>{!! trans('system.action.delete') !!}
                                </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="alert alert-info"> {!! trans('system.no_record_found') !!}</div>
    @endif
</section>

@stop

@section('footer')

<script>
    !function ($) {
        $(function(){
            //init value for control
            var category = getParameterByName('categoryId');
            var status = getParameterByName('status');
            var show_child = getParameterByName('show_child');

            if(category !== '')
                $('#category').val(category);

            if(status !== '')
                $('#status').val(status);

            if(show_child !== '')
                $('#show_child').val(show_child);
        });
    }(window.jQuery);

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function filter() {
        var params = '';
        if($('#category').val() != 0)
            params += '&categoryId=' + $('#category').val();
        if($('#status').val() != -1)
            params += '&status=' + $('#status').val();
        if($('#show_child').val() != 0)
            params += '&show_child=' + $('#show_child').val();

        if(params.length == 0)
            window.location = "{!! route('admin.project-categories.index') !!}";
        else
            window.location = "{!! route('admin.project-categories.index') !!}?" + params.substring(1);
    };

</script>
@stop