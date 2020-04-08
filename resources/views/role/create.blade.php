@extends('layouts.menu')
@section('content')
    @include('layouts.toolbar',['toolbar'=>__('res.role_create')])
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
    <form role="form" method="post" action="{{route('role.store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label>نام دسترسی</label>
            <input class="form-control"  name="name" placeholder="name" required>
        </div>

        <select name="permission[]" multiple id="rezaa">
            @foreach($permissions as $per)
                <option value="{{$per->id}}">{{$per->title}}</option>
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

    @endsection
