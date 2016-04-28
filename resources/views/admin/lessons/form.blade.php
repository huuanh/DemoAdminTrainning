@extends('admin.adminLayout')

@section('content')

<div class="row col-lg-12">
    @include('admin.lessons.menubar')

    <div class="col col-lg-9">
        {!! Form::open(array('route' => ['admin.lessons.update', $lesson->id], 'method' => 'put')) !!}
            <div class="form-group">
                {!! Form::text('type_id', $lesson->type_id, ['class' => 'form-control', 'placeholder' => 'type']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('part_id', $lesson->part_id, ['class' => 'form-control', 'placeholder' => 'part']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('lesson', $lesson->lesson, ['class' => 'form-control', 'placeholder' => 'lesson']) !!}
            </div>
            <div class="form-group">
                <span>has preview:</span>
                {!! Form::radio('preview', 'true', ['class' => 'form-control']) !!}
                <span>no preview:</span>
                {!! Form::radio('preview', 'false', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::number('pre_lesson_id', $lesson->pre_lesson_id, ['class' => 'form-control', 'placeholder' => 'lesson preview']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('content', $lesson->content, ['class' => 'form-control', 'placeholder' => 'content']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('lessonCode', $lesson->lessonCode, ['class' => 'form-control', 'placeholder' => 'lesson code']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('OK', ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('admin.lessons.index', 'Cancel') !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>
@stop