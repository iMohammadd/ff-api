@extends('master')
@section('title')
    لیست مشتری ها
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">لیست مشتری ها</h3>
    </div>

        <div class="table-responsive">
            <table id="users" class="table table-striped">
                <thead>
                    <tr>
                        <th>نام مشتری</th>
                        <th>تعداد فاکتورها</th>
                        <th><a href="{{route('users.create')}}" class="btn btn-primary pull-left">ایجاد مشتری جدید</a></th>
                    </tr>
                </thead>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{count($user->factors)}}</td>
                        <td><div class="btn-group pull-left"><a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-sm btn-danger">ویرایش</a> <a href="{{route('factor.add',['id'=>$user->id])}}" class="btn btn-sm btn-info pull-left">فاکتور جدید</a></div> </td>
                    </tr>
                @endforeach
            </table>
        </div>

@stop
@section('side')
    @include('sidebar')
@stop
