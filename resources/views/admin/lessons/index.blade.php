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

                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
