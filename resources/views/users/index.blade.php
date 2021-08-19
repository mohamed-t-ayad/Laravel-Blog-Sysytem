@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Users</h2>
    <div class="row m-auto">
        <div class="col-sm-12">
            <table class="table">
                @php
                    $i =1;
                @endphp
                @if ($users->count() > 0 )
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('user.destroy',['id'=>$user->id])}}" class="btn btn-danger"><i class="far fa-trash-alt"></i> delete</a>
                            </td>
                        </tr>
                        @endforeach
                @else
                    <div class="alert alert-primary">No Users to display.</div>
                @endif
                </tbody>
            </table>
            <div class="text-right">
                <a href="{{route('user.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New User</a>
            </div>
        </div>
    </div>
</div>
@endsection
