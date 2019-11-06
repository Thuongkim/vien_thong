@extends('backend.master')

@section('title')
{!! trans('system.action.list') !!} {!! trans('partners.label') !!}
@stop

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {!! trans('partners.label') !!}
        <small>{!! trans('system.action.list') !!}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{!! route('admin.home') !!}">{!! trans('system.home') !!}</a></li>
        <li><a href="{!! route('admin.partners.index') !!}">{!! trans('partners.label') !!}</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content overlay">
    <div class="row">
        <div class="col-md-2" style='float: left;'>
            <a href="{!! route('admin.partners.create') !!}" class='btn btn-primary btn-flat'>
                <span class="glyphicon glyphicon-plus"></span>&nbsp;{!! trans('system.action.create') !!}
            </a>
        </div>
    </div>
    @if (count($partners) > 0)
    <div class="box">
        <?php $i = 1; ?>
        <div class="box-body no-padding">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">#</th>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('partners.name') !!} </th>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('partners.slogan') !!} </th>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('partners.image') !!} </th>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('system.status.label') !!} </th>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('system.updated_at') !!} </th>
                        <th style="text-align: center; vertical-align: middle;"> {!! trans('system.action.label') !!} </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partners as $item)
                    <tr>
                        <td style="text-align: center; vertical-align: middle;">{!! $i++ !!}</td>
                        <td style="text-align: justify; vertical-align: middle;">
                            {!! $item->name !!}
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            {!! \App\Helper\HString::modSubstr($item->slogan, 50) !!}
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            @if($item->image)
                            <img src="{!! asset('assets/media/images/partners/' . $item->image) !!}" height="50px" style="max-width: 80px;">
                            @endif
                        </td>
                        <td style="text-align: center; vertical-align: middle;">
                            @if($item->status == 0)
                            <span class="label label-danger"><span class='glyphicon glyphicon-remove'></span></span>
                            @elseif($item->status == 1)
                            <span class="label label-success"><span class='glyphicon glyphicon-ok'></span></span>
                            @endif
                        </td>
                        <td style="text-align: center; vertical-align: middle;">{!! date("d/m/Y", strtotime($item->updated_at)) !!}</td>
                        <td style="text-align: center; vertical-align: middle;">
                            {{-- {!! Form::open(['route' => ['admin.partners.destroy', $item->id], 'method' => 'delete']) !!} --}}
                            <a href="{!! route('admin.partners.edit', $item->id) !!}" class="text-warning"><i class="glyphicon glyphicon-edit"></i> Sửa </a>
                            {{-- {!! Form::button('<i class="glyphicon glyphicon-remove"></i>&nbsp;Xóa', ['type' => 'submit', 'class' => 'btn-danger', 'onclick' => "return confirm('Bạn chắc chẵn sẽ xóa (các) mục này?')"]) !!} --}}
                            <a href="{!! route('admin.partners.delete', $item->id) !!}" class="btn-confirm text-danger"><i class="glyphicon glyphicon-remove"></i> Xóa </a>
                            {{-- {!! Form::close() !!} --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="alert alert-success" style="margin-top: 20px;"> {!! trans('system.no_record_found') !!}</div>
    @endif
</section><!-- /.content -->
@stop