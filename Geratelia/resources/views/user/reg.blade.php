@extends('def')

@section('title','register')

@section('header')
        <nav class="navbar navbar-expand-lg navbar-light ">
        <h1><i class="material-icons">face</i>Gelateria</h1>
        <form class="form-inline my-2 my-lg-0">
        <a href="/login" class="login_link btn btn-outline-success my-2 my-sm-0 ml-4"> Login <i class="material-icons">input</i></a>
        </form>
    </nav>
@endsection

@section('intro')
    <div class='intro'>
        <div class='read'>Welcome to Gelateria. Let's add your account!</div>
    </div>
@endsection

@section('form')
    <div class="reg-form">
            <h1 class="display-4"><i class="material-icons">person_add</i>Register</h1>
            <form method='post' action="{{ url('/users') }}" class='login-form'>
            {{ csrf_field() }}

            <div class='text'>Name</div>
            <input type="text" class="name" name="name" placeholder="enter name" value="{{ old('name') }}"><br>
            @if ($errors->has('name'))
                <span class='error'>{{ $errors->first('name')}}</span>
                @endif

            <div class='text'>e-mail</div>
            <input type="text" class="mail" name="mail" placeholder="enter address" value="{{ old('mail') }}"><br>
                @if ($errors->has('mail'))
                <span class='error'>{{ $errors->first('mail')}}</span>
                @endif

            <div class='text'>Password</div>
            <input type="password" name="pass" placeholder="enter password" value="{{ old('pass') }}"><br>
                @if ($errors->has('pass'))
                <span class='error'>{{ $errors->first('pass')}}</span>
                @endif

            <div class='text'>Confirm Password</div>
            <input type="password" name="pass_confirm" placeholder="enter password again"><br>
                @if ($errors->has('pass_confirm'))
                <span class='error'>{{ $errors->first('pass_confirm')}}</span><br>
                @endif

            <input type="submit" value='Register' class='submit'>
            </form>
    </div>
@endsection

