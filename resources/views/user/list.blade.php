@extends('layouts.menu')
@section('content')
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>نام کاربری</th>
                        <th>دسترسی ها</th>
                        <th>تاریخ ایجاد</th>
                        <th> عملیات</th>
                    </tr>
                    </thead>
                    <tbody>



@foreach($users as $user)
                    <tr>
                        <td>{{$user->username}}</td>
                        <td>
                        @foreach($user->permissions as $per)
                                {{$per->name}}<br>
                            @endforeach
                        </td>

                        <td class="center">{{$user->created_at}}</td>

                        <td class="center">
                            @can('update_user')
                            <a class="btn btn-info" href="{{route('user.edit',['user'=>$user->id])}}">
                                <i class=" white edit">نمایش اطلاعات و ویرایش</i>
                            </a>
@endcan
                                @can('delete_user')

                                <form  method="post" action="{{route('user.destroy',['user'=>$user->id])}}">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger" value="حذف">
                            </form>
@endcan
                        </td>
                    </tr>
@endforeach


                    </tbody>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/row-->


@endsection
