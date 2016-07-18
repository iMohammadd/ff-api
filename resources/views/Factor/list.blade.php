@extends('master')
@section('title')
    فاکتورها
@stop
@section('head')
    <link href="{{asset('assets/css/sweetalert.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('assets/css/twitter.css')}}" type="text/css" rel="stylesheet">
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
                    <td><div class="btn-group pull-left"><a href="{{route('pay.index',['id'=>$item->id])}}" class="btn btn-xs btn-success">پرداخت</a> <a href="{{route('factor.view', ['Factor'=> $item->id])}}" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i> ویرایش</a><a onclick="deleteItem({{$item->id}})" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i> حذف</a></div></td>
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
@section('script')
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script>
        function deleteItem(id) {
            swal({
                        title: "از حذف کردن این فاکتور مطمئنید؟",
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
                                    id +'/delete'
                            );
                        }
                    });
        }
    </script>
@stop