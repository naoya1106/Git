@extends('def')

@section('title','Login')

@section('header')
    <nav class="navbar navbar-expand-lg navbar-light ">
        <h1><i class="material-icons">face</i>Gelateria</h1>
        <form class="form-inline my-2 my-lg-0">
        <a href="/reg" class="login_link btn btn-outline-success my-2 my-sm-0 ml-4">
        <i class="material-icons">person_add</i>Register</a>
        </form>
    </nav>
@endsection

@section('intro')
    <div class='intro'>
        <div class='read'>Welcome to Gelateria. Let's login with your name!</div>
    </div>
@endsection

@section('form')
    <div class="log-form">
        <h1 class="display-4 mt-5">Login <i class="material-icons">input</i></h1>
        <form method='post' action="{{ url('/enter') }}" class='login-form'>
            {{ csrf_field() }}
            <div class='text' style='display:inline'>name:</div>
            <input type="text" name="name">
            <input type="submit" value='Login' class='submit'>
        </form>
    </div>
@endsection
