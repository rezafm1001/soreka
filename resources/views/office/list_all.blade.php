@extends('layouts.menu')
@section('content')
    @include('layouts.toolbar',['toolbar'=>__('res.office_all')])
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

                                <th>نام شرکت</th>
                                <th>نام مدیر</th>
                                <th>زمیه فعالیت</th>
                                <th>تاریخ ایجاد</th>
                                <th>کاربر ایجاد کننده</th>
                                <th>عملیات</th>

                            </tr>
                            </thead>
                            <tbody>




                            @foreach($offices as $office)
                                <tr>
                                    <td>{{$office->office_name}}</td>
                                    <td>{{$office->manager_name}}</td>
                                    <td>{{$office->activity}}</td>
                                    <td>{{$office->created_at}}</td>
                                    <td>{{$office->user->username}}</td>
                                    <td>



                                        @can('delete_office')
                                            <form  method="post" action="{{route('office.destroy',['office'=>$office->id])}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <input type="submit" class="btn btn-danger" value="{{__('res.delete')}}">
                                            </form>
                                        @endcan
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
