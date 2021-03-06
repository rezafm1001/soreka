@extends('layouts.menu')
@section('content')
    @include('layouts.toolbar',['toolbar'=>__('res.user_create')])
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <form role="form" method="post" action="{{route('user.store')}}">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label>نام کاربری</label>
                                    <input class="form-control"  name="username" placeholder="username" required>
                                </div>

                                <div class="form-group">
                                    <label>پسورد</label>
                                    <input class="form-control" type="password" name="password" placeholder="password" required minlength="4">
                                </div>

                                <select id="rezaa" name="role[]" multiple >
                                    @foreach($roles as $p)
                                        <option dir="ltr" value="{{$p->id}}">{{$p->name}}</option>
                                    @endforeach
                                </select>

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
    <div>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $e)
                    <li>
                        <p class="alert-danger">{{$e}}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection

