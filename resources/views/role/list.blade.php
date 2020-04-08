@extends('layouts.menu')
@section('content')
    @include('layouts.toolbar',['toolbar'=>__('res.role_list')])
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                        <th>نام نقش</th>
                        <th>دسترسی ها</th>
                        <th>تاریخ ایجاد</th>
                        <th> عملیات</th>
                            </tr>
                            </thead>
                            <tbody>



                            @foreach($roles as $role)
                    <tr>
                        <td>{{$role->name}}</td>
                        <td>
                        @foreach($role->permissions as $per)
                                {{$per->title}}<br>
                            @endforeach
                        </td>

                        <td>{{$role->created_at}}</td>

                        <td>

@if($role->id!=1)

@can('delete_role')
                                <form  method="post" action="{{route('role.destroy',['role'=>$role->id])}}">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="submit" class="btn btn-danger" value="{{__('res.delete')}}">
                            </form>
    @endcan
    @else
        امکان حذف و ویرایش این نقش وجود ندارد
    @endif
                        </td>
                    </tr>
@endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

@endsection
