@extends('layouts.app')

@section('content')

@php
    $genderArray = ['Male' , 'Female'];
@endphp

<div class="container p-3">
    <h3 class="text-center">Update Profile</h3>
    @if (count($errors)>0)
        @foreach ($errors->all() as $item)
        <div class="alert alert-danger" role="alert">
            {{$item}}
        </div>
        @endforeach

    @endif
    <form class="row g-3 w-50 m-auto" method="POST" action="{{route('profile.update')}}">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div class="col-12">
          <input type="text" class="form-control" name="facebook" value="{{$user->profile->facebook}}">
        </div>
        <div class="col-md-12">
          <input type="text" class="form-control" name="city" value="{{$user->profile->city}}">
        </div>
        <div class="col-md-12">
          <select name="gender" class="form-select">
            @foreach ($genderArray as $gender )
                <option value="{{$gender}}" {{($user->profile->gender == $gender) ? 'selected':''}}>{{$gender}}</option>

            @endforeach
          </select>
        </div>
        <div class="col-md-12">
            <textarea class="form-control" name="bio" placeholder="Bio">
               {!! $user->profile->bio !!}
            </textarea>
        </div>
        <div class="col-md-6">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="col-md-6">
            <input type="password" class="form-control" name="c_password" placeholder="Confirm Password">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>

@endsection
