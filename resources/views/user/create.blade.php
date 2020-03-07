@extends('layouts.menu')
@section('content')

    <form method="post" action="{{route('user.store')}}">
        {{csrf_field()}}
     <input type="text" name="username" placeholder="username"><br>
    <input type="password" name="password" placeholder="password"><br>
        دسترسی ها<select name="role[]" multiple>
            @foreach($roles as $p)
            <option value="{{$p->id}}">{{$p->name}}</option>
                @endforeach
        </select>
    <input type="submit" value="Save">

    </form>

@endsection
