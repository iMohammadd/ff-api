@extends('master')
@section('title')
    افزودن سفارش برای فاکتور {{$order->factor->customer}}
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">افزودن سفارش برای فاکتور {{$order->factor->customer}}</h3>
    </div>
    <div class="panel-body">
        <div class="">
            <form method="post" action="{{route('order.store', ['id'=> $order->id])}}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="title" value="{{$order->title}}" class="form-control" placeholder="عنوان سفارش" required>
                </div>
                <button class="btn btn-primary form-control" type="submit">ثبت سفارش</button>
            </form>
        </div>

    </div>
@stop
@section('side')
    @include('sidebar')
@stop