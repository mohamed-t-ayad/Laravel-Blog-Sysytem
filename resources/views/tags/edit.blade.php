@extends('layouts.app')

@section('content')

<div class="container text-center p-5">
    <div class="row m-auto">
        <div class="col-sm-12">
            <div class="jumbotron mb-5">
                <h2 class="display-4">Edit Post</h2>
            </div>

            <form method="post" action="{{route('posts.update',['id'=>$tag->id])}}" class="w-50 m-auto" enctype="multipart/form-data">
                @csrf
                <input class="form-control mb-3" type="text" name="title" value="{{$tag->tag}}">
                <input type="submit" class="btn btn-success" value="update Post">

                @if(Session::has('success'))
                    <div class="alert alert-success mt-3">{{Session::get('success')}}</div>
                @endif
            </form>
        </div>
    </div>
</div>


@endsection
