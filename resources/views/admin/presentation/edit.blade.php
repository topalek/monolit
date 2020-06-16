@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-10">
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

    {!! Form::model($presentation, array('class' => 'form', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.presentation.update', $presentation->id))) !!}

    <div class="form-group">
        {!! Form::label('text', 'Описание') !!}
        {!! Form::textarea('text', old('text',$presentation->text), array('class'=>'form-control ckeditor')) !!}

    </div>

    <div class="form-group">
        {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
        {!! link_to_route(config('quickadmin.route').'.presentation.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>

    {!! Form::close() !!}

@endsection