@extends('master')
@section('title')
    ورود به سیستم
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">ورود به سیستم</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="{{route('user.auth')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="email">ایمیل</label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">کلمه عبور</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <button class="btn btn-info form-control">ورود به سیستم</button>
            </div>
        </form>
    </div>
@stop