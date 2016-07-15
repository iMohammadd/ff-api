<nav>
    <ul class="nav nav-pills nav-stacked">
        <li><a href="{{route('dashboard.index')}}"><i class="glyphicon glyphicon-dashboard"></i> داشبورد</a> </li>
        <li><a href="{{route('users.list')}}"><i class="glyphicon glyphicon-user"></i> مشتری ها</a> </li>
        <li><a href="{{route('factor.list')}}"><i class="glyphicon glyphicon-list-alt"></i> فاكتورها</a></li>
        <li><a href="{{route('users.edit',['id'=>Auth::user()->id])}}"><i class="glyphicon glyphicon-user"></i> تغيير كلمه عبور</a></li>
        <li><a href="{{route('user.logout')}}"><i class="glyphicon glyphicon-log-out"></i> خروج از سيستم</a></li>
    </ul>
</nav>