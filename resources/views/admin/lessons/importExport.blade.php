@extends('layouts.adminLayout')

@section('content')

<div class="row col-lg-12">
    @include('admin.lessons.menubar')

    <div class="content">
        <a href="/admin/lessons/downloadExcel/xls"><button class="btn btn-success">Download Lesson Excel xls</button></a>
        <a href="/admin/lessons/downloadExcel/xlsx"><button class="btn btn-success">Download Lesson Excel xlsx</button></a>
        <a href="/admin/lessons/downloadExcel/csv"><button class="btn btn-success">Download Lesson CSV</button></a>
        <hr/>
        <form action="{{ URL::to('/admin/lessons/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="file" name="import_file" />
            <br/>
            <button class="btn btn-primary">Import File</button>
        </form>

        {{--{!! Form::open(array('url' => ['/admin/lessons/importExcel'], 'method' => 'post')) !!}--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::file('import_file', '', ['class' => 'form-horizontal']) !!}--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::submit('Import File', ['class' => 'btn btn-primary']) !!}--}}
            {{--</div>--}}
        {{--{!! Form::close() !!}--}}
    </div>
</div>
@stop