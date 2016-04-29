@extends('layouts.adminLayout')

@section('content')

<div class="row col-lg-12">
    @include('admin.lessons.menubar')

    <div class="col col-lg-9">
        <div class="row col-lg-12">
            <div class="row">
                <div class="col">
                    {!! link_to_route('admin.lessons.create', '新規登録', [], ['class' => 'btn btn-primary']) !!}
                    <a class="btn btn-primary" href="/admin/lessons/importExport">CSVインポート</a>
                </div>

                <div class="col col-lg2">

                </div>
            </div>
        </div>
        <hr/>
        <div class="row col col-lg-12">
                    {!! Form::open(['method'=>'GET','route'=>'admin.lessons.index','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="type" placeholder="中分類　タイトル...">
                            <input type="text" class="form-control" name="part" placeholder="小分類　タイトル...">
                            <div class="form-control">
                                <span>has preview:</span>
                                <input checked="checked" name="preview" type="radio" value="true">
                                <span>no preview:</span>
                                <input checked="checked" name="preview" type="radio" value="false">
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search">Search</i>
                            </button>
                        </div>
                    {!! Form::close() !!}
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
                    <td>{!! link_to_route('admin.lessons.edit', 'Edit', [$lesson->id], ['class' => 'btn btn-primary']) !!}</td>
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
