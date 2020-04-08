@extends('layouts.menu')
@section('content')
    @include('layouts.toolbar',['toolbar'=>__('res.update')])
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
    <form role="form" method="post" action="{{route('user.update',['user'=>$user->id])}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}

        <div class="form-group">
            <label>نام کاربری</label>
            <input class="form-control"  name="username" placeholder="username" value="{{$user->username}}" required>
        </div>

        <div class="form-group">
            <label>پسورد</label>
            <input class="form-control"  name="password" placeholder="password" required type="password">
        </div>
@if($user->id!=1)
        دسترسی ها<select id="rezaa" name="role[]" multiple>
            @foreach($roles as $p)
            <option <?php
                foreach ($user->roles as $role){
                    if($role->id==$p->id){
                echo 'selected';
            }
                    }
            ?>
                    value="{{$p->id}}">{{$p->name}}
            </option>
                @endforeach
        </select>
        @else
            <div class="form-group">
                <label>دسترسی</label>
                <input class="form-control"  value="{{$user->roles()->first()->name}}" disabled>
                <input type="text" name="role" value="1" hidden>
            </div>
    @endif
        <br>
        <input class="btn btn-info" type="submit" value="{{__('res.save')}}">
    </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
