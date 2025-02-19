@extends('layouts.app')
@section('content')
<div class="container">
<h1>Blog Posts</h1>
  <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('posts.delete', $post) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection