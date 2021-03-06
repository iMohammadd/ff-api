@extends('master')
@section('title')
    ویرایش فاکتور {{$factor->customer}} | {{$factor->num}}
@stop
@section('main')
    <div class="panel-heading">
        <h3 class="panel-title">    ویرایش فاکتور {{$factor->customer}} | {{$factor->num}}
        </h3>
    </div>
    <div class="panel-body">
        <div class="">
            <form method="post" action="{{route('factor.store', ['id'=>$factor->id])}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="num">شماره فاکتور</label>
                    <input type="text" name="num" id="num" value="{{$factor->num}}" class="form-control" placeholder="شماره فاکتور" required>
                </div>
                <div class="form-group">
                    <label for="name">نام</label>
                    <input type="text" name="customer" value="{{$factor->customer}}" id="name" class="form-control" placeholder="نام" required>
                </div>
                <div class="form-group">
                    <label for="price">هزینه</label>
                    <input type="text" name="price" value="{{$factor->price}}" id="price" class="form-control" placeholder="هزینه" required>
                </div>
                <div class="form-group">
                    <label for="status">وضعیت</label>
                    <select name="status" class="form-control">
                        <option value="در دست بررسی">در دست بررسی</option>
                        <option value="پذیرفته شده">پذیرفته شده</option>
                        <option value="رد شده">رد شده</option>
                        <option value="در حال انجام">در حال انجام</option>
                        <option value="ارسال شده">ارسال شده</option>
                        <option value="تحویل داده شده">تحویل داده شده</option>
                    </select>
                </div>
                <button class="btn btn-primary form-control" type="submit">ثبت فاکتور</button>
            </form>
        </div>

    </div>
@stop
@section('side')
    @include('sidebar')
@stop