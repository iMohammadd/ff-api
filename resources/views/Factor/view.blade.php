@extends('master')
@section('title')
    سفارشات {{$factor->customer}}
@stop
@section('head')
    <link href="{{asset('public/assets/css/sweetalert.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('public/assets/css/twitter.css')}}" type="text/css" rel="stylesheet">
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">سفارشات {{$factor->customer}} <a href="{{route('factor.edit', ['id'=> $factor->id])}}" class="pull-left"><span class="glyphicon glyphicon-edit"></span></a></h3>

    </div>
    <div class="panel-body">
        <div class="">
            <p>مشتری: {{$factor->user->name}}</p>
            <p>شماره فاکتور: {{$factor->num}}</p>
            <p>تعداد سفارشات: {{count($factor->order)}}</p>
            <p>هزینه: {{number_format($factor->price)}} تومان</p>
            <p> وضعیت سفارش:{{$factor->status}}
            <form method="post" action="{{route('factor.status', ['id'=>$factor->id])}}">
                {{csrf_field()}}
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="در دست بررسی">در دست بررسی</option>
                        <option value="پذیرفته شده">پذیرفته شده</option>
                        <option value="رد شده">رد شده</option>
                        <option value="در حال انجام">در حال انجام</option>
                        <option value="ارسال شده">ارسال شده</option>
                        <option value="تحویل داده شده">تحویل داده شده</option>
                    </select>
                </div>
                <button class="btn btn-primary form-control" type="submit">تغییر وضعیت</button>
            </form>
            </p>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>مشتری</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($factor->order as $item)
                <tr>
                    <th scope="row"></th>
                    <td>{{$item->title}}</td>
                    <td><div class="btn-group pull-left"><a href="{{route('order.edit', ['id'=>$item->id])}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></a><a onclick="deleteItem({{$item->id}})" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i></a></div></td>
                </tr>
                @endforeach
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td><a href="{{route('order.add', ['id'=>$factor->id])}}" class="btn btn-primary pull-left">سفارش جدید</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('side')
    @include('sidebar')
@stop
@section('script')
    <script src="{{asset('public/assets/js/sweetalert.min.js')}}"></script>
    <script>
        function deleteItem(id) {
            swal({
                        title: "از حذف کردن این سفارش مطمئنید؟",
                        text: "در صورت حذف قابل بازیابی نمی‌باشد",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "بله",
                        cancelButtonText: "خیر",
                        closeOnConfirm: false
                    },
                    function(isConfrim){
                        if(isConfrim) {
                            window.location.assign(
                                    '../order/'+ id +'/delete'
                            );
                        }
                    });
        }
    </script>
@stop