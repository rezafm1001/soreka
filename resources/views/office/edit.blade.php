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
                            <form role="form" method="post" action="{{route('office.update',['office'=>$office->id])}}">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <div class="form-group">
                                    <label>نام شرکت</label>
                                    <input class="form-control"  name="office_name" required value="{{$office->office_name}}">
                                </div>

                                <div class="form-group">
                                    <label>نام شهر</label>
                                    <input class="form-control"  name="city_name" value="{{$office->city_name}}">
                                </div>
                                <div class="form-group">
                                    <label>زمیه فعالیت</label>
                                    <input class="form-control"  name="activity" value="{{$office->activity}}">
                                </div>
                                <div class="form-group">
                                    <label>نام کارشناس</label>
                                    <input class="form-control"  name="expert_name" value="{{$office->expert_name}}">
                                </div>
                                <div class="form-group">
                                    <label>نام مدیر</label>
                                    <input class="form-control"  name="manager_name" value="{{$office->manager_name}}">
                                </div>

                                <div class="form-group">
                                    <label>مدل فروش</label>
                                    <select class="form-control" name="sell_model">
                                        <option value="1"<?php if ($office->sell_model == 1) {
                                            echo ' selected';
                                        } ?>>رسمی
                                        </option>
                                        <option value="0"<?php if ($office->sell_model == 0) {
                                            echo ' selected';
                                        } ?>>غیر رسمی
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>برندهای تحت پوشش</label>
                                    <input class="form-control"  name="brand" value="{{$office->brand}}">
                                </div>

                                <div class="form-group">
                                    <label>توضیحات</label>
                                    <textarea class="form-control" name="description" rows="3">{{$office->brand}}</textarea>
                                </div>


                                <div class="form-group">
                                    <label>آدرس</label>
                                    <input class="form-control"  name="address" value="{{$office->address}}">
                                </div>




                                <span class="btn btn-default" style="padding: 3px;" onclick="addFilter()">افزودن شماره تلفن</span><br><br>

                                <div id="filters_holder" class="row">

                                    @foreach($office->PhoneNumbers as $key=>$phone)
                                        <input class="form-control" name="name[{{$key}}]" type="text" style="margin-left: 10px;" placeholder="نام و سمت شخص"
                                               value="{{$phone->name}}">
                                        <input class="form-control" name="phone[{{$key}}]" type="text" style="margin-left: 10px;" placeholder="شماره تلفن"
                                               value="{{$phone->phone}}">
                                    @endforeach

                                </div>

                                <br><br>
                                <button type="submit" class="btn btn-info">{{__('res.save')}}</button>
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
                        {{$e}}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>





    <script>
        function addFilter() {
            var count = document.getElementsByClassName("divi").length +{{sizeof($office->PhoneNumbers)}};
            var txt = '<br><div style=" height: 30px; margin: 10px 0;" class="divi">' +
                '<input class="form-control" name="name[' + count + ']" type="text"  placeholder="نام و سمت شخص">' +
                '<input class="form-control" name="phone[' + count + ']" type="text"  placeholder="شماره تلفن">' +
                '</div>';
            $("#filters_holder").append(txt);
        }
    </script>









@endsection
