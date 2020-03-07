@extends('layouts.menu')
@section('content')
    <form method="post" action="{{route('role.store')}}">
        {{csrf_field()}}
        <input type="text" placeholder="name" name="name"><br>
        <select name="permission[]" multiple>
            @foreach($permissions as $per)
                <option value="{{$per->id}}">{{$per->name}}</option>
                @endforeach
        </select>
        <input type="submit" value="Save">
    </form>


    @endsection
