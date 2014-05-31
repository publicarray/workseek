<!DOCTYPE HTML>
<html lang='en'>

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="favicon.ico" />
    <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/cosmo/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300">
    <style>
        body{
            margin-top: 54px;
        }
/*        .splash {
          height: 30em;
          padding-top: 14em;
          margin-bottom: 2em;
          background-image: url("../images/splash.jpg");
          background-size: cover;
          color: #fff;
          text-align: center;
      }*/

      h1, h2, h3, h4, .btn{
          font-family:"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
          font-weight: 300;
      }

      p {
          margin-bottom: 2em;
          line-height: 1.6em;
      }
      aside{
        background: #f5f5f5;
        padding: 10px;
    }

    footer{
      margin-top: 4em;
  }
</style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                {{link_to_route('home', 'WorkSeek', null, array('class'=>'navbar-brand'))}}
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
                <ul class="nav navbar-nav">
                    <li>{{link_to_route('job.index', 'Jobs', null, array('class'=>''))}}</li>
                    <li>{{link_to_route('employer.create', 'Employers', null, array('class'=>''))}}</li>
                </ul>
                @if (Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text">Hello {{ Auth::user()->username }}!</p></li>
                    <li>{{ link_to_route('user.logout', 'Sign out') }}</li>
                </ul>
                @endif
            </div>
        </div>
    </nav>
    <div class="container">
        <header class="col-sm-12">
            <h1 class="text-center">@yield('title')</h1>
        </header>
        <aside class="col-sm-4">
            @if (Auth::check())
            <div class="col-sm-12">
                <img src="{{ asset(Auth::user()->image->url()) }}">
                <p class="">Hello {{ Auth::user()->username }}!</p>
                <p class="">Account Type: {{ Auth::user()->role }}</p>
            </div>
            @if (Auth::check() && Auth::user()->role == 'seeker')
            <div class="col-sm-12">
                {{link_to_route('seeker.show', 'View Profile')}}
            </div>
            @endif
            @if (Auth::check() && Auth::user()->role == 'employer')
            <div class="col-sm-12">
                {{link_to_route('employer.show', 'View Profile')}}
            </div>
            <div class="col-sm-12">
                {{ link_to_route('job.create', 'Advertise a Job', null, array('class'=>'btn btn-primary', 'style'=>'width:50%;')) }}
            </div>
            <div class="col-sm-12">
                {{ link_to_route('job.listjobs', 'Show all Jobs', null, array('class'=>'btn btn-primary', 'style'=>'width:50%;')) }}
            </div>
            @endif
            <div class="col-sm-12">
                <br />
                {{link_to_route('user.logout', 'Sign out', null, array('class'=>'btn btn-primary', 'style'=>'width:50%;'))}}
            </div>
            @else
            {{ Form::open(array('route' => 'user.login', 'method' => 'POST', 'class'=>'form-horizontal')) }}
            <label class="col-md-4 control-label">Username</label>
            <div class="form-group col-md-8 @if ($errors->first('username'))has-error@endif">
                {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
                @if ($errors->first('username'))
                <label class="control-label" for="username">{{ $errors->first('username') }}</label>
                @endif
            </div>
            <label class="col-md-4 control-label">Password</label>
            <div class="form-group col-md-8 @if ($errors->first('password'))has-error@endif">
                {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                @if ($errors->first('password'))
                <label class="control-label" for="password">{{ $errors->first('password') }}</label>
                @endif
            </div>
            <div class="col-xs-12">
                <div class="col-xs-4 col-md-offset-3">
                    {{ Form::submit('Sign In', array('class'=>'btn btn-primary')) }}
                </div>
                <div class="col-xs-5">
                    {{link_to_route('seeker.create', 'or Register', null, array('class'=>'btn btn-default'))}}
                </div>
            </div>
            {{ Form::close() }}
            @endif
            <br /><br /><br />
        </aside>
        <div class="col-sm-8">
            @if(Session::has('message'))
            <p class="bg-danger text-center" style="color:white;">{{ Session::get('message') }}</p>
            @endif
            @yield('body')
        </div>
    </div>
    <footer class="col-sm-12">
        <hr>
        <div class="container">
            <div class="row">
                <div style="text-align:left" class="col-sm-4"><p>&copy; Sebastian Schmidt S2894777</p></div>
                <div style="text-align:center" class="col-xs-4"><p><a href="docs">Documentation</a></p></div>
                <div style="text-align:right" class="col-sm-4"><p>Validation: <a href="http://validator.w3.org/check?uri=referer">validator.w3.org</a></p></div>
            </div>
        </div>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" defer></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" defer></script>
</body>

</html>
