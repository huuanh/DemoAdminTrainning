@extends('adminLayout')

@section('content')

<div class="row col-lg-12">
    <div class="col col-lg-3">
        <div class="row">
            <h4>This is logo!!</h4>
        </div>

        <div class="row">
            <h4>this is menu bar!!</h4>
        </div>
    </div>

    <div class="col col-lg-9">
        <div class="row col-lg-12">
            <div class="row">
                <div class="col col-lg-2 col-lg-offset-0">
                <td><a class="btn btn-primary" href="{!! URL::route('admin.lessons.create') !!}">New Lesson</a></td>
                </div>

                <div class="col col-lg2">

                </div>
            </div>
        </div>
        <div class="row col-lg-12">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>PL Trung</th>
                    <th>PL Nho</th>
                    <th>Lesson</th>
                    <th>Pre-task</th>
                    <th>Pre-read</th>
                    <th>Lesson_id</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                  <tr>
                    <td>{!! $lesson->type_id !!}</td>
                    <td>{!! $lesson->part_id !!}</td>
                    <td>{!! $lesson->lesson !!}</td>
                    <td>{!! ($lesson->pre_lesson_id >> 0) !!}</td>
                    <td>{!! $lesson->pre_lesson_id !!}</td>
                    <td>{!! $lesson->lessonCode !!}</td>
                    <td><a class="btn btn-primary" href="{!! URL::route('admin.lessons.edit', $lesson->id) !!}">Edit</a></td>
                    <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.lessons.destroy', $lesson->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
