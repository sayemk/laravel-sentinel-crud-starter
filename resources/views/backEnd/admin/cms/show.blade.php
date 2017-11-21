@extends('backLayout.app')
@section('title')
CMS Post
@stop

@section('content')

    <h1>CMS Post <a href="{{ url('admin/cms/' . $cms->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a></h1>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Section</th>
                <td>: {{ $cms->section }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>: {{ $cms->title }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>: {{ $cms->slug }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>: {!! $cms->description !!}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>: <img class="img-rounded" src="{{ $cms->image }}" alt=""></td>
            </tr>
        </table>
    </div>

@endsection