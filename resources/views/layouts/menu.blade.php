@extends('layouts.layout')
@section('menu')
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>




                <li>
                    <a href="#"><i class="fa fa-phone fa-fw"></i>{{__('res.office')}}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{route('office.create')}}">{{__('res.office_create')}}</a>
                        </li>
                        <li>
                            <a href="{{route('office.index')}}">{{__('res.office_list')}}</a>
                        </li>
                        @can('see_all_offices')
                        <li>
                            <a href="{{route('office.all')}}">{{__('res.office_all')}}</a>
                        </li>
                            @endcan
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                @canany(['create_user','see_users'])
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i>{{__('res.user')}}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @can('create_user')
                        <li>
                            <a href="{{route('user.create')}}">{{__('res.user_create')}}</a>
                        </li>
                        @endcan
                            @can('see_users')

                            <li>
                            <a href="{{route('user.index')}}">{{__('res.user_list')}}</a>
                        </li>
                       @endcan
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                @endcanany
                @canany(['create_role','see_roles'])
                <li>
                    <a href="#"><i class="fa fa-key fa-fw"></i>{{__('res.role')}}<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @can('create_role')
                            <li>
                                <a href="{{route('role.create')}}">{{__('res.role_create')}}</a>
                            </li>
                        @endcan
                        @can('see_roles')

                            <li>
                                <a href="{{route('role.index')}}">{{__('res.role_list')}}</a>
                            </li>
                        @endcan
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
@endcanany




            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>













@endsection
