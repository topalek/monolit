@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.blocks.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($blocks->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>Block Display ?</th>
<th>Image</th>
<th>Title</th>
<th>Link #1</th>
<th>Link #2</th>
<th>Block Display ?</th>
<th>Image</th>
<th>Title</th>
<th>Link #1</th>
<th>Link #2</th>
<th>Block Display ?</th>
<th>Image</th>
<th>Link #1</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($blocks as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ $row->show_1 }}</td>
<td>@if($row->image_1 != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->image_1 }}">@endif</td>
<td>{{ $row->title_1 }}</td>
<td>{{ $row->link_1_1 }}</td>
<td>{{ $row->link_1_2 }}</td>
<td>{{ $row->show_2 }}</td>
<td>@if($row->image_2 != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->image_2 }}">@endif</td>
<td>{{ $row->title_2 }}</td>
<td>{{ $row->link_2_1 }}</td>
<td>{{ $row->link_2_2 }}</td>
<td>{{ $row->show_3 }}</td>
<td>@if($row->image_3 != '')<img src="{{ asset('uploads/thumb') . '/'.  $row->image_3 }}">@endif</td>
<td>{{ $row->link_3 }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.blocks.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.blocks.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.blocks.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop