@extends('master')
@section('title')
    تغییر کلمه عبور
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">تغییر کلمه عبور</h3>
    </div>
    <div class="panel-body">
        <form method="post" action="{{route('user.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="password">کلمه عبور فعلی</label>
                <input class="form-control" type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="newpassword">کلمه عبور جدید</label>
                <input class="form-control" type="password" id="newpassword" name="newpassword">
            </div>
            <div class="form-group">
                <label for="confrimpassword">تکرار کلمه عبور جدید</label>
                <input class="form-control" type="password" id="confrimpassword" name="confrimpassword">
            </div>

            <div class="form-group">
                <button class="btn btn-info form-control">تغییر</button>
            </div>
        </form>
    </div>
@stop
@section('side')
    @include('sidebar')
@stop