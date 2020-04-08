@extends('layouts.menu')
@section('content')
    @include('layouts.toolbar',['toolbar'=>__('res.user_list')])
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
                                <th>نام کاربری</th>
                                <th>نقش ها</th>
                                <th>تاریخ ایجاد</th>
                                <th>ایجاد کننده</th>
                                <th> عملیات</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->username}}</td>
                                    <td>
                                        @foreach($user->roles as $per)
                                            {{$per->name}}<br>
                                        @endforeach
                                    </td>

                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <?php
                                        if($user->creator_id!=0){
                                        $creator=App\User::where('id',$user->creator_id)->first();
                                        echo $creator->username;
                                        }
                                        ?>
                                    </td>

                                    <td>
                                        @if($user->id!=1)
                                        @can('update_user')
                                            <a class="btn btn-info" href="{{route('user.edit',['user'=>$user->id])}}">
                                                <i class=" white edit">{{__('res.update')}}</i>
                                            </a>
                                        @endcan
                                        @can('delete_user')

                                            <form method="post" action="{{route('user.destroy',['user'=>$user->id])}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <input type="submit" class="btn btn-danger" value="{{__('res.delete')}}">
                                            </form>
                                        @endcan
                                            @else
                                        امکان حذف و ویرایش این کاربر وجود ندارد
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
