@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">All Posts</h2>
    <div class="row m-auto">
        <div class="col-sm-12">
            @if(Session::has('message'))
                    <div class="alert alert-warning mt-3">{{Session::get('message')}}</div>
            @endif
            <table class="table">
                @php
                    $i =1;
                @endphp
                @if ($posts->count() > 0 )
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">User</th>
                            <th scope="col">photo</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$post->title}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>
                                <img class="img-fluid img-thumbnail" src="{{$post->photo}}" width="100" height="100" alt="{{$post->photo}}"/>
                            </td>
                            <td>{{$post->created_at->diffForhumans()}}</td>
                            <td>
                                <a href="{{route('posts.show',['slug'=>$post->slug])}}" class="btn btn-info text-light"><i class="far fa-eye"></i> show</a>
                                @if ($post->user_id == Auth::id())
                                    <a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-primary"><i class="far fa-edit"></i> edit</a>
                                    <a href="{{route('posts.destroy',['id'=>$post->id])}}" class="btn btn-danger"><i class="far fa-trash-alt"></i> Trash</a>
                                @endif
                                </td>
                        </tr>
                        @endforeach
                @else
                    <div class="alert alert-primary">No Posts to display.</div>
                @endif
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{route('posts.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Post</a>
                <a href="{{route('posts.trashed')}}" class="btn btn-danger"><i class="far fa-trash-alt"></i> Trash</a>
            </div>
        </div>
    </div>
</div>
@endsection
