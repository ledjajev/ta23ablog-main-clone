@extends('partials.layout')
@section('title', 'Posts')
@section('content')
<a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
@if(Route::is('posts.deleted'))
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">All Posts</a>
@else
    <a href="{{ route('posts.deleted') }}" class="btn btn-secondary">Deleted Posts</a>
@endif

{{ $posts->links() }}
<div class="bg-base-100 border border-base-content/5 rounded-box">
    <table class="table table-zebra">
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Created</th>
            <th>Update</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr class="hover:bg-base-300">
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <div class="join">
                            @if($post->trashed())
                                <form action="{{ route('posts.restore', $post)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn join-item btn-success">Restore</button>
                                </form>
                                <form action="{{ route('posts.permadestroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn join-item btn-error">Perma Delete</button>
                                </form>
                            @else
                                <a class="btn join-item btn-info">View</a>
                                <a href="{{ route('posts.edit', $post) }}" class="btn join-item btn-warning">Edit</a>
                                <form action="{{ route('posts.destroy', $post)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn join-item btn-error">Delete</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <th>ID</th>
            <th>Title</th>
            <th>Created</th>
            <th>Update</th>
            <th>Actions</th>
        </tfoot>
    </table>
</div>
{{ $posts->links() }}
@endsection
