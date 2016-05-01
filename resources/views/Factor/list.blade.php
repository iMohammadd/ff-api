@extends('master')
@section('title')
    فاکتورها
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">فاکتورها</h3>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>مشتری</th>
                    <th>وضعیت</th>
                    <th><a href="{{route('factor.add')}}" class="btn btn-primary pull-left">فاکتور جدید</a></th>
                </tr>
                </thead>
                <tbody>
                @foreach($factors as $item)
                <tr>
                    <th scope="row"></th>
                    <td><a href="{{route('factor.view', ['Factor'=> $item->id])}}">{{$item->customer}}</a></td>
                    <td>{{$item->status}}</td>
                    <td><div class="btn-group pull-left"><a href="{{route('factor.view', ['Factor'=> $item->id])}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a><a href="#" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i></a></div></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <nav>
            <ul class="pagination pagination-sm pull-left font-tahoma">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@stop
@section('side')
    @include('sidebar')
@stop