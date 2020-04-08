@extends('layouts.html')
@section('body')
    @if(session()->has('login_status'))
        <div class="alert">
            <p>{{session()->get('login_status')}}</p>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{{route('login')}}">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="username" type="text" placeholder="type username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="type password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        مرا به خاطر داشته باش</label>
                                    <input name="remember" type="checkbox">

                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <BUTTON class="btn btn-lg btn-success btn-block">{{__('res.login')}}</BUTTON>
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
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
