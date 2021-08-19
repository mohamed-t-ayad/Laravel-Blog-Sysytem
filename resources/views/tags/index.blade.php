@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">All Tags</h2>
    <div class="row m-auto">
        <div class="col-sm-12">
            <table class="table">
                @php
                    $i =1;
                @endphp
                @if ($tags->count() > 0 )
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$tag->tag}}</td>
                            <td>
                                <a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-primary"><i class="far fa-edit"></i> edit</a>
                                <a href="{{route('tag.destroy',['id'=>$tag->id])}}" class="btn btn-danger"><i class="far fa-trash-alt"></i> delete</a>
                            </td>
                        </tr>
                        @endforeach
                @else
                    <div class="alert alert-primary">No tags to display.</div>
                @endif
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{route('tag.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New Tag</a>
            </div>
        </div>
    </div>
</div>
@endsection
