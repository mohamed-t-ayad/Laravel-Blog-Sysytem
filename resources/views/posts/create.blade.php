@extends('layouts.app')

@section('content')

<div class="container text-center p-5">
    <div class="row m-auto">
        <div class="col-sm-12">
            <div class="jumbotron mb-5">
                <h2 class="display-4">Create Post</h2>
            </div>

            <form method="POST" action="{{route('posts.store')}}" class="w-50 m-auto" enctype="multipart/form-data">
                @csrf
                <input class="form-control mb-3" type="text" name="title" placeholder="Title">
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <textarea class="form-control mb-3" name="content" placeholder="Content"></textarea>
                @error('content')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <input class="form-control mb-3" type="file" name="photo" placeholder="photo">
                @foreach ($tags as $tag )
                    <input class="mb-4" type="checkbox" name="tags[]" value="{{$tag->id}}">
                    <label for="">{{$tag->tag}}</label>
                @endforeach
                  <br>
                <input type="submit" class="btn btn-primary" value="Save Post">

                @if(Session::has('success'))
                    <div class="alert alert-success mt-3">{{Session::get('success')}}</div>
                @endif
            </form>
        </div>
    </div>
</div>


@endsection
