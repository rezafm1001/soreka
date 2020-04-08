@extends('layouts.menu')
@section('content')
    @include('layouts.toolbar',['toolbar'=>'پنل'])



    @if(auth()->user()->id==1)
        @if(auth()->user()->created_at==auth()->user()->updated_at)
            <h1>{{auth()->user()->username}} عزیز ، به پنل خوش آمدید</h1>
            کاربر گرامی ، برای امنیت بیشتر ، اطلاعات ورودی خود را از <a href="{{route('user.edit',['user'=>auth()->user()->id])}}">اینجا</a> ویرایش کنید....
            @endif

    @endif
@endsection
