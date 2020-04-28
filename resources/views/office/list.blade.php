@extends('layouts.menu')
@section('content')
    @include('layouts.toolbar',['toolbar'=>__('res.office_list')])
    <div class="row">

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <form method="get" action="{{route('office.index')}}">
                                <div style="float: right">
                            <input type="text" class="form-control"  placeholder="Search..." name="text">
                                <select name="field" class="form-control">
                                    <option value="office_name">نام شرکت</option>
                                    <option value="manager_name">نام مدیر</option>
                                    <option value="activity">زمینه فعالیت</option>
                                    <option value="city_name">نام شهر</option>
                                    <option value="expert_name">نام کارشناس</option>
                                </select>
                                    </div>
                                <span class="input-group-btn">
                                <button  class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </form>
                        </div>
                    </div>
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
                                <th>نام شهر</th>
                                <th>نام کارشناس</th>
                                <th>مدل فروش</th>
                                <th>تاریخ ایجاد</th>
                                <th> عملیات</th>

                            </tr>
                            </thead>
                            <tbody>



                            @foreach($offices as $office)
                                <tr>
                                    <td>{{$office->office_name}}</td>
                                    <td>{{$office->manager_name}}</td>
                                    <td>{{$office->activity}}</td>
                                    <td>{{$office->city_name}}</td>
                                    <td>{{$office->expert_name}}</td>
                                    <td><?php if ($office->sell_model==1){
                                        echo 'رمسی';
                                        }else{
                                        echo 'غیر رسمی';
                                        } ?>
                                    </td>
                                    <td>{{$office->created_at}}</td>

                                    <td>

                                        <a class="btn btn-info" href="{{route('office.edit',['office'=>$office->id])}}">
                                            <i class=" white edit">{{__('res.update')}}</i>
                                        </a>
                                        <form  method="post" action="{{route('office.destroy',['office'=>$office->id])}}">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input type="submit" class="btn btn-danger" value="{{__('res.delete')}}">
                                        </form>

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


{{$offices->links()}}
@endsection
