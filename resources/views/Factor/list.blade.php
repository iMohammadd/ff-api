@extends('master')
@section('title')
    فاکتورها
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">فاکتورها</h3>
    </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>شماره فاکتور</th>
                    <th>مالک</th>
                    <th>وضعیت</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($factors as $item)
                <tr>
                    <th scope="row"></th>
                    <td><a href="{{route('factor.view', ['Factor'=> $item->id])}}">{{$item->num}}</a></td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->status}}</td>
                    <td><div class="btn-group pull-left"><a href="{{route('factor.view', ['Factor'=> $item->id])}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a><a href="#" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i></a></div></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <nav>
            <div class="pull-left font-tahoma">
               {{$factors->links()}}
            </div>
        </nav>

@stop
@section('side')
    @include('sidebar')
@stop