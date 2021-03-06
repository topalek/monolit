@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($realty, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.realty.update', $realty->id))) !!}

<div class="form-group">
    {!! Form::label('main_title', 'Title*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('main_title', old('main_title',$realty->main_title), array('class'=>'form-control')) !!}
        
    </div>
</div>
<div class="form-group">
    {!! Form::label('main_url', '#URL*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('main_url', old('main_url',$realty->main_url), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('img', 'img', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('img') !!}
        {!! Form::hidden('img_w', 4096) !!}
        {!! Form::hidden('img_h', 4096) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('active', 'Block Display ?', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::hidden('active','') !!}
        {!! Form::checkbox('active', 1, $realty->active == 1) !!}
        
    </div>
</div>

<hr>

<div class="realty-items">
    @foreach( $realty->items as $item )
        <div class="group route">
            <i class="fa fa-trash trash"></i>

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title*</label>
                <div class="col-sm-10">
                    <input class="form-control" required value="{{$item->title}}" name="title[]" type="text" id="title">
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">URL*</label>
                <div class="col-sm-10">
                    <input class="form-control" required name="url[]" value="{{$item->url}}" type="text" id="url">
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="form-group">
    <label for="title" class="col-sm-2 control-label">+</label>
    <div class="col-sm-10">
        <button type="button" class="btn btn-success clone"><i class="fa fa-map-signs" aria-hidden="true"></i> Add item</button>
    </div>
</div>
<hr>

<style>
    .trash {
        position: absolute;
        color: red;
        cursor: pointer;
        font-size: 20px!important;
        display: block;
        z-index: 9;
        margin-top: 10px;
        margin-left: 150px;
    }
</style>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.realty.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

<div class="group route-copy" style="display: none">
    <i class="fa fa-trash trash"></i>

    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Title*</label>
        <div class="col-sm-10">
            <input class="form-control" required value="" name="title[]" type="text" id="title">

        </div>
    </div>
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">URL*</label>
        <div class="col-sm-10">
            <input class="form-control" required name="url[]" value="" type="text" id="url">
        </div>
    </div>
</div>

<script src="{{ asset('monolit/js/jquery.min.js') }}"></script>
<script>
  $(function() {
    $('body').on('click', '.trash', function () {
      console.log(1);
      $(this).parent().remove();
    });
    $('.clone').click(function () {
      data = $('.route-copy').html();
      $('.realty-items').append('<div class="group route">' + data + '</div>');
    });
    $('body').on('click', '.trash', function () {
      $(this).parent().remove();
    });


  });
</script>

@endsection