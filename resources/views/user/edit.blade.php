@extends('layouts.menu')
@section('content')

    <form method="post" action="{{route('user.update',['user'=>$user->id])}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
     <input type="text" name="username" placeholder="username" value="{{$user->username}}"><br>
    <input type="password" name="password" placeholder="password"><br>
        دسترسی ها<select name="permission[]" multiple>
            @foreach($permissions as $p)
            <option <?php
                foreach ($user->permissions as $per){
                    if($per->id==$p->id){
                echo 'selected';
            }
                    }
            ?> value="{{$p->id}}">{{$p->name}}</option>
                @endforeach
        </select>
    <input type="submit" value="Save">

    </form>

@endsection
