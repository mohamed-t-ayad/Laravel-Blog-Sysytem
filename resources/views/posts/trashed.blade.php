@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Trashed Posts</h2>
    <div class="row m-auto">
        <div class="col-sm-12">
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
                                <img class="img-fluid img-thumbnail" src="{{URL::asset($post->photo)}}" width="100" height="100" alt="{{$post->photo}}"/>
                            </td>
                            <td>{{$post->created_at->diffForhumans()}}</td>
                            <td>
                                <a href="{{route('posts.restore',['id'=>$post->id])}}" class="btn btn-info">Restore</a>
                                <a href="{{route('posts.hdelete',['id'=>$post->id])}}" class="btn btn-danger">Force Delete</a>
                            </td>
                        </tr>
                        @endforeach
                @else
                    <div class="alert alert-primary">Trash is Empty</div>
                @endif
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{route('posts')}}" class="btn btn-primary">All Posts</a>
            </div>
        </div>
    </div>
</div>
@endsection
