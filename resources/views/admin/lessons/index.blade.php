@extends('adminLayout')

@section('content')

<div class="row col-lg-12">
    @include('admin.lessons.menubar')

    <div class="col col-lg-9">
        <div class="row col-lg-12">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="{!! URL::route('admin.lessons.create') !!}">新規登録</a>
                    <a class="btn btn-primary" href="admin/importExport">CSVインポート</a>
                </div>

                <div class="col col-lg2">

                </div>
            </div>
        </div>
        <div class="row col-lg-12">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>中分類　タイトル</th>
                    <th>小分類　タイトル</th>
                    <th>レッスン　タイトル</th>
                    <th>事前課題指示文　タイトル</th>
                    <th>ﾌﾟﾚﾘｰﾄﾞID　タイトル</th>
                    <th>レッスンシートID　タイトル</th>
                    <th>アクション</th>
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
