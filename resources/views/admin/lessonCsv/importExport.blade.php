@extends('adminLayout')

@section('content')

<div class="row col-lg-12">
    @include('admin.lessons.menubar')

    <div class="content">
        <a href="{{ URL::to('admin/downloadExcel/xls') }}"><button class="btn btn-success">Download Lesson Excel xls</button></a>
        <a href="{{ URL::to('admin/downloadExcel/xlsx') }}"><button class="btn btn-success">Download Lesson Excel xlsx</button></a>
        <a href="{{ URL::to('admin/downloadExcel/csv') }}"><button class="btn btn-success">Download Lesson CSV</button></a>
        <hr/>
        <form action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="file" name="import_file" />
            <br/>
            <button class="btn btn-primary">Import File</button>
        </form>
    </div>
</div>
@stop