<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Weibo App</a>
        <ul class="navbar-nav justify-content-end">
            {{--<li class="nav-item"><a class="nav-link" href="/help">帮助</a></li>--}}
            @if(Auth::check())
                <li class="nav-item"><a class="nav-link" href="#">用户列表</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('users.show',Auth::user())}}">个人中心</a>
                        <a class="dropdown-item" href="#">编辑资料</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="logout" href="#">
                            <form action="{{route('logout')}}" method="POST">
                                {{--隐藏域  相当于<input type = "hidden" name = "_token" value = "。。。"--}}
                                {{csrf_field()}}
                                {{--隐藏域  相当于<input type = "hidden" name = "_method" value = "DELETE"--}}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                            </form>
                        </a>
                    </div>
                </li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{route('help')}}">帮助</a></li>
                <li class="nav-item" ><a class="nav-link" href="{{route('login')}}">登录</a></li>
            @endif
        </ul>
    </div>
</nav>