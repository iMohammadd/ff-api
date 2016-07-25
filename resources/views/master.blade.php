<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/style.css')}}" rel="stylesheet">
    @yield('head')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section class="container">
    <div class="row">
        <div class="col-md-3 font-shabnam main-panel">
            @yield('side')
        </div>
        <div class="col-md-6 font-shabnam main-panel">
            @include('message')
            <div class="panel panel-default">
                @yield('main')
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</section>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
@yield('script')
</body>
</html>