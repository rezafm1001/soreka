@extends('layouts.layout')
@section('menu')

    <div id="sidebar-left" class="span2">
        <div class="nav-collapse sidebar-nav">
            <ul class="nav nav-tabs nav-stacked main-menu">
                <li><a href="/home"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>


                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">مشخصات شرکت های همکار</span><span
                            class="label label-important"></span></a>
                    <ul>
                        <li><a class="submenu" href="{{route('office.create')}}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet">افزودن شرکت جدید</span></a></li>
                        <li><a class="submenu" href="{{route('office.index')}}"><i class="icon-file-alt"></i><span
                                    class="hidden-tablet">لیست مشخصات شرکت ها</span></a></li>
                        @can('see_all')
                            <li><a class="submenu" href="{{route('office.all')}}"><i class="icon-file-alt"></i><span
                                        class="hidden-tablet">لیست تمام شرکت ها</span></a></li>
                        @endcan

                    </ul>
                </li>


                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">کاربران</span><span
                            class="label label-important"></span></a>
                    <ul>
                        @can('create_user')
                            <li><a class="submenu" href="{{route('user.create')}}"><i class="icon-file-alt"></i><span
                                        class="hidden-tablet">افزودن کاربر جدید</span></a></li>
                        @endcan
                        @can('see_users')
                            <li><a class="submenu" href="{{route('user.index')}}"><i class="icon-file-alt"></i><span
                                        class="hidden-tablet">لیست کاربران</span></a></li>
                        @endcan
                    </ul>
                </li>


                <li>
                    <a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">دسترسی ها</span><span
                            class="label label-important"></span></a>
                    <ul>
                            <li><a class="submenu" href="{{route('role.create')}}"><i class="icon-file-alt"></i><span
                                        class="hidden-tablet">افزودن نقش جدید</span></a></li>
                            <li><a class="submenu" href="{{route('role.index')}}"><i class="icon-file-alt"></i><span
                                        class="hidden-tablet">لیست نقش ها</span></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>


@endsection
