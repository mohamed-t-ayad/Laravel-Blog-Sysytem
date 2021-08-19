@extends('layouts.app')

@section('content')

<div class="container text-center p-5">
    <div class="row m-auto">
        <div class="col-sm-12">
            <div class="jumbotron mb-5">
                <h2 class="display-4">Create Tag</h2>
            </div>

            <form method="POST" action="{{route('tag.store')}}" class="w-50 m-auto">
                @csrf
                <input class="form-control mb-3" type="text" name="tag" placeholder="Tag">
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <input type="submit" class="btn btn-primary" value="Save Tag">

                @if(Session::has('success'))
                    <div class="alert alert-success mt-3">{{Session::get('success')}}</div>
                @endif
            </form>
        </div>
    </div>
</div>


@endsection
