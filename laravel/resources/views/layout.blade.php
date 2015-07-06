<!DOCTYPE HTML>
<html lang='en'>
{{--*/ $host = Request::root() /*--}}
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <meta name="author" content="Sebastian Schmidt">
    <link rel="stylesheet" type="text/css" href="{{$host}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <link rel="stylesheet" type="text/css" href="{{$host}}/assets/css/style.css">
    @yield('head')
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="{{Request::root()}}" class="navbar-brand">WorkSeek</a>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li><a href="{{$host}}/job">Jobs</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li><p class="navbar-text">Hello {{ Auth::user()->username }}!</p></li>
                    <li><a href="{{$host}}/user/logout">Sign out</a></li>
                @else
                    <li><a href="{{$host}}/employer/create">Employers Sign Up</a></li>
                @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <header class="col-sm-12">
                <h1 class="text-center">@yield('title')</h1>
            </header>
            <aside class="col-sm-3">
                @if (Auth::check())
                <div class="col-sm-12">
                <!-- The Auth::user object does not contain 'image' using workaround -->
                    {{-- <img class="img-responsive center-block img-thumbnail" src="{{ asset(Auth::user()->image->url('thumb')) }}"> --}}
                <!-- Start workaround of bug: https://github.com/CodeSleeve/laravel-stapler/issues/79 -->
                    @if ( strlen(Auth::user()->image_file_name) > 0 )
                        <img class="img-responsive center-block img-thumbnail" src="{{$host}}/system/User/images/{{ chunk_split( str_pad( Auth::user()->id, 9, '0', STR_PAD_LEFT ), 3, '/' ) }}thumb/{{ Auth::user()->image_file_name }}">
                    @else
                        <img src="{{$host}}/images/thumb/missing.png" class="img-responsive center-block img-thumbnail" />
                    @endif
                <!-- End workaround -->
                    <p class="text-center">{{{ Auth::user()->name }}}</p>
                    <p>Account Type: {{ Auth::user()->role }}<br />
                </div>
                @if (Auth::check() && Auth::user()->role == 'seeker')
                <div class="col-sm-12">
                    <a href="{{$host}}/seeker/{{Auth::user()->id}}" class="btn btn-default btn-block">View Profile</a>
                </div>
                @endif
                @if (Auth::check() && Auth::user()->role == 'employer')
                <div class="col-sm-12">
                    <a href="{{$host}}/employer/{{Auth::user()->id}}" class="btn btn-primary btn-block" >View Profile</a>
                </div>
                <div class="col-sm-12">
                    <a href="{{$host}}/job/create" class="btn btn-primary btn-block" >Advertise a Job</a>
                </div>
                <div class="col-sm-12">
                    <a href="{{$host}}/job/listjobs" class="btn btn-primary btn-block" >Your Jobs</a>
                </div>
                @endif
                <div class="col-sm-12">
                    <br />
                    <a href="{{$host}}/user/logout" class="btn btn-primary btn-block">Sign out</a>
                </div>
                @else
                <h2 class="text-center">Log In</h2>
                <form method="POST" action="{{$host}}/user/login" accept-charset="UTF-8" class="form-horizontal">
                    {!! csrf_field() !!}
                    <!-- <label class="col-md-4 control-label">Username</label> -->
                    <div class="form-group col-md-12 ">
                        <input class="form-control" placeholder="Username" name="username" type="text">
                    </div>
                    <!-- <label class="col-md-4 control-label">Password</label> -->
                    <div class="form-group col-md-12 ">
                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                    </div>
                    <div class="form-group col-md-12">
                        <div class="col-md-12">
                            <input class="btn btn-primary btn-block" type="submit" value="Sign In">
                        </div>
                        <div class="col-md-12">
                            <a href="{{$host}}/seeker/create" class="btn btn-default btn-block">or Register</a>
                        </div>
                    </div>
                </form>
                @endif
            </aside>
            <div class="col-sm-9">
                @if(Session::has('message'))
                <p class="bg-danger text-center" style="color:white;">{{ Session::get('message') }}</p>
                @endif
                @yield('body')
            </div>
        </div>
    </div>
    <footer class="col-sm-12">
        <div class="container">
            <div class="row">
                <div style="text-align:left" class="col-sm-4"><p>&copy; Sebastian Schmidt S2894777</p></div>
                <div style="text-align:center" class="col-xs-4"><p><a href="{{$host}}/docs">Documentation</a></p></div>
                <div style="text-align:right" class="col-sm-4"><p>Validation: <a href="http://validator.w3.org/check?uri=referer">validator.w3.org</a></p></div>
            </div>
        </div>
    </footer>
    <script src="{{$host}}/assets/js/jquery.min.js"></script>
    <script src="{{$host}}/assets/js/bootstrap.min.js" defer></script>
    @yield('script')
</body>

</html>
