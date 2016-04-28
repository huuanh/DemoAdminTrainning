@extends('admin.adminLayout')

@section('content')

<div class="row col-lg-12">
    @include('admin.lessons.menubar')

    <div class="col col-lg-9">
        @if ($errors->has())
            <ul style="color:rgba(255, 0, 0, 0.78);">
              @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
              @endforeach
            </ul>
        @endif

        {!! Form::open(array('route' => 'admin.lessons.store', 'method' => 'post')) !!}
            <div class="form-group">
                {!! Form::text('type_id', '', ['class' => 'form-control', 'placeholder' => 'type']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('part_id', '', ['class' => 'form-control', 'placeholder' => 'part']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('lesson', '', ['class' => 'form-control', 'placeholder' => 'lesson']) !!}
            </div>
            <div class="form-group">
                <span>has preview:</span>
                {!! Form::radio('preview', 'true', ['class' => 'form-control']) !!}
                <span>no preview:</span>
                {!! Form::radio('preview', 'false', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::number('pre_lesson_id', '', ['class' => 'form-control', 'placeholder' => 'lesson preview']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('content', '', ['class' => 'form-control', 'placeholder' => 'content']) !!}
            </div>
            <div class="form-group">
                {!! Form::text('lessonCode', '', ['class' => 'form-control', 'placeholder' => 'lesson code']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                {!! link_to_route('admin.lessons.index', 'Cancel') !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>
@stop