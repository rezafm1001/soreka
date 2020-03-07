@extends('layouts.html')
@section('body')
    <style type="text/css">
        body { background: url(/admin/img/bg-login.jpg) !important; }
    </style>
@if(session()->has('login_status'))
    <div class="alert">
        <p>{{session()->get('login_status')}}</p>
    </div>
    @endif
    <div class="container-fluid-full">
        <div class="row-fluid">

            <div class="row-fluid">
                <div class="login-box">
                    <div class="icons">
                        <a href="index.html"><i class="halflings-icon home"></i></a>
                        <a href="#"><i class="halflings-icon cog"></i></a>
                    </div>
                    <h2>Login to your account</h2>
                    <form class="form-horizontal" action="{{route('login')}}" method="post">
                        @csrf
                        <fieldset>

                            <div class="input-prepend" title="Username">
                                <span class="add-on"><i class="halflings-icon user"></i></span>
                                <input class="input-large span10" name="username" id="username" type="text" placeholder="type username"/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password">
                                <span class="add-on"><i class="halflings-icon lock"></i></span>
                                <input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
                            </div>
                            <div class="clearfix"></div>

                            <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

                            <div class="button-login">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="clearfix"></div>
                        </fieldset>
                    </form>
                    @if($errors->any())
                        <ui>
                            @foreach($errors->all() as $e)
                                <li class="alert">
                                    {{$e}}
                                </li>
                            @endforeach
                        </ui>
                    @endif
                    @endsection

                </div><!--/span-->
            </div><!--/row-->


        </div><!--/.fluid-container-->

    </div><!--/fluid-row-->
