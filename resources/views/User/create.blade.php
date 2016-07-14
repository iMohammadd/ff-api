@extends('master')
@section('title')
    مشتری جدید
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">مشتری جدید</h3>
    </div>
    <div class="panel-body">
        <div class="">
            <form method="post" action="{{route('users.create.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">نام مشتری</label>
                    <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="نام مشتری" required>
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="ایمیل" required>
                </div>
                <div class="form-group">
                    <label for="password">کلمه عبور</label>
                    <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control" placeholder="کلمه عبور" required>
                </div>
                <div class="form-group">
                    <label for="confirm">کلمه عبور</label>
                    <input type="password" name="confirm" id="confirm" value="{{old('confirm')}}" class="form-control" placeholder="تکرار کلمه عبور" required>
                </div>

                <button class="btn btn-primary form-control" type="submit">ایجاد مشتری</button>
            </form>
        </div>

    </div>
@stop
@section('side')
    @include('sidebar')
@stop