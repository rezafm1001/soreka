@extends('layouts.html')
@section('body')
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="margin-left: 50px" class="navbar-brand">{{env('APP_NAME','PhoneBook')}}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{route('user.edit',['user'=>auth()->user()->id])}}"><i class="fa fa-user fa-fw"></i>تغییر اطلاعات ورود</a>
                        </li>

                        <li class="divider"></li>
                        <li>
{{--                            <a href="d"></a>--}}

                            <form method="post" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" style="margin-right: 3px;"><i class="fa fa-sign-out fa-fw"></i>{{__('res.logout')}}</button>
                            </form>

                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
@yield('menu')
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

            <!-- /.row -->
            <!-- /.row -->
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
@endsection
