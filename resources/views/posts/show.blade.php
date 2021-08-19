@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center p-4">Post Show</h2>
        @if(Session::has('message'))
            <div class="alert alert-warning mt-3">{{Session::get('message')}}</div>
        @endif
    <div class="card">
        <img class="card-img-top d-block m-auto" style="width:30rem;" src="{{URL::asset($post->photo)}}" alt="{{$post->photo}}"/>
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <p class="card-text">{{$post->content}}</p>
            @foreach ($tags as $tag )
                    <label for=""> - {{$tag->tag}}</label><br>
            @endforeach
          <p>Created at : {{$post->created_at->diffForhumans()}}</p>
          <p>updated at : {{$post->updated_at->diffForHumans()}}</p>
          <a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-primary">edit</a>
          <a href="{{route('posts')}}" class="btn btn-primary">All Posts</a>
        </div>
      </div>
</div>
@endsection
