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
    <div class="col-md-10">
        {!! Form::model($blocks, array('files' => true, 'class' => 'form', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.blocks.update', $blocks->id))) !!}
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('show_1', 'Block Display ?') !!}
                        {!! Form::hidden('show_1','') !!}
                        {!! Form::checkbox('show_1', 1, $blocks->show_1 == 1) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title_1', 'Title') !!}
                        {!! Form::text('title_1', old('title_1',$blocks->title_1), array('class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name_1_1', 'Name #1') !!}
                        {!! Form::text('name_1_1', old('link_1_1',$blocks->name_1_1), array('class'=>'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('name_1_2', 'Name #2') !!}
                        {!! Form::text('name_1_2', old('link_1_2',$blocks->name_1_2), array('class'=>'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('image_1', 'Image') !!}
                        <img src="{{ asset('uploads/'.$blocks->image_1) }}" alt="{{$blocks->image_1}}">
                        {!! Form::file('image_1') !!}
                        {!! Form::hidden('image_1_w', 4096) !!}
                        {!! Form::hidden('image_1_h', 4096) !!}
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">

                </div>
            </div>

            <div class="form-group">
                {!! Form::label('link_1_1', 'Link #1') !!}
                {!! Form::text('link_1_1', old('link_1_1',$blocks->link_1_1), array('class'=>'form-control')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('link_1_2', 'Link #2') !!}
                {!! Form::text('link_1_2', old('link_1_2',$blocks->link_1_2), array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="jumbotron">
            <div class="form-group">
                {!! Form::label('show_2', 'Block Display ?') !!}
                {!! Form::hidden('show_2','') !!}
                {!! Form::checkbox('show_2', 1, $blocks->show_2 == 1) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image_2', 'Image') !!}
                {!! Form::file('image_2') !!}
                {!! Form::hidden('image_2_w', 4096) !!}
                {!! Form::hidden('image_2_h', 4096) !!}
            </div>
            <div class="form-group">
                {!! Form::label('title_2', 'Title') !!}
                {!! Form::text('title_2', old('title_2',$blocks->title_2), array('class'=>'form-control')) !!}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('name_2_1', 'Name #1') !!}
                        {!! Form::text('name_2_1', old('link_2_1',$blocks->name_2_1), array('class'=>'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('link_2_1', 'Link #1') !!}
                        {!! Form::text('link_2_1', old('link_2_1',$blocks->link_2_1), array('class'=>'form-control')) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name_2_2', 'Name #2') !!}
                {!! Form::text('name_2_2', old('link_2_2',$blocks->name_2_2), array('class'=>'form-control')) !!}

            </div>
            <div class="form-group">
                {!! Form::label('link_2_2', 'Link #2') !!}
                {!! Form::text('link_2_2', old('link_2_2',$blocks->link_2_2), array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="jumbotron">
            <div class="form-group">
                {!! Form::label('show_3', 'Block Display ?') !!}
                {!! Form::hidden('show_3','') !!}
                {!! Form::checkbox('show_3', 1, $blocks->show_3 == 1) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image_3', 'Image') !!}
                {!! Form::file('image_3') !!}
                {!! Form::hidden('image_3_w', 4096) !!}
                {!! Form::hidden('image_3_h', 4096) !!}
            </div>
            <div class="form-group">
                {!! Form::label('title_3', 'Title') !!}
                {!! Form::text('title_3', old('title_3',$blocks->title_3), array('class'=>'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('link_3', 'Link #1') !!}
                {!! Form::text('link_3', old('link_3',$blocks->link_3), array('class'=>'form-control')) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
            {!! link_to_route(config('quickadmin.route').'.blocks.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection