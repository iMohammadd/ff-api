@extends('master')
@section('title')
    داشبورد
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">داشبورد</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">آخرین مشتری ها</h4>
                    </div>
                    <table class="table table-striped">
                        <tbody>
                        @foreach($users as $user)
                            <tr><td>{{$user->name}}</td></tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">آخرین فاکتور ها</h4>
                    </div>
                    <table class="table table-striped">
                        <tbody>
                        @foreach($factors as $factor)
                            <tr><td><a href="{{route('factor.view', ['Factor'=> $factor->id])}}">{{$factor->num}}</a> </td><td>{{number_format($factor->price)}} تومان</td></tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('side')
    @include('sidebar')
@stop