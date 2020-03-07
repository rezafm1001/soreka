@extends('layouts.menu')
@section('content')

    <h1>Welcome {{auth()->user()->username}}</h1>


    @endsection
