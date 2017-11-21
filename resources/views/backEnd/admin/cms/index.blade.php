@extends('backLayout.app')
@section('title')
All CMS Posts
@stop

@section('content')

    <h1>CMS Post <a href="{{ url('admin/cms/create') }}" class="btn btn-primary pull-right btn-sm">Add New CMS Post</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbladmin">
            <thead>
                <tr>
                    <th>ID</th><th>Section</th><th>Title</th><th>Slug</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cms as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->section }}</td>
                    <td>
                        <a href="{{ url('admin/cms', $item->id) }}">{{ $item->title }}</a>
                    </td>
                    <td>{{ $item->slug }}</td>
                    <td>
                        <a href="{{ url('admin/cms', $item->id) }}" class="btn btn-success btn-xs">View</a>
                        <a href="{{ url('admin/cms/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/cms', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tbladmin').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection