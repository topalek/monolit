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

    {!! Form::model($hometext, ['class' => 'form', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => [config('quickadmin.route').'.hometext.update', $hometext->id]]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title*') !!}
        {!! Form::text('title', old('title',$hometext->title), ['class'=>'form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description*') !!}
        {!! Form::textarea('description', old('description',$hometext->description), ['class'=>'form-control ckeditor']) !!}

    </div>

    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), ['class' => 'btn btn-primary']) !!}
            {!! link_to_route(config('quickadmin.route').'.hometext.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, ['class' => 'btn btn-default']) !!}
        </div>
    </div>

    {!! Form::close() !!}

@endsection