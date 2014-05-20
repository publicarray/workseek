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
    .splash {
        height: 30em;
        padding-top: 14em;
        margin-bottom: 2em;
        background-image: url("splash.jpg");
        background-size: cover;
        color: #fff;
        text-align: center;
    }
    h1, h2, h3, h4, .btn{
        font-family:"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-weight: 300;
    }
    p {
        margin-bottom: 2em;
        line-height: 1.6em;
    }
    footer{
        margin-top: 4em;
    }
    </style>
</head>

<body>
    <nav>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    {{link_to_route('job.index', 'WorkSeek', null, array('class'=>'navbar-brand'))}}
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            {{link_to_route('employer.index', 'Employers', null, array('class'=>''))}}
                        </li>
                    </ul>
                    
                    {{ Form::open(array('route' => 'user.login', 'method' => 'POST', 'class'=>'navbar-form navbar-right')) }}
                    <div class="form-group">
                    {{ Form::text('username', null, array('class'=>'form-control input-sm', 'placeholder'=>'Username')) }}
                    </div>
                    <div class="form-group">
                    {{ Form::password('password', array('class'=>'form-control input-sm', 'placeholder'=>'Password')) }}
                    </div>
                    <div class="form-group">
                    {{ Form::submit('Login', array('class'=>'btn btn-default')) }}
                    {{link_to_route('user.create', 'or Register', null, array('class'=>''))}}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </nav>
    <header>
        <div class="splash">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @yield('header')
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            @yield('body')
        </div>
        <footer class="row">
            <hr>
            <div class="container">
                <div class="row">
                    <div style="text-align:left" class="col-xs-4"><p>&copy; Sebastian Schmidt S2894777</p></div>
                    <div style="text-align:center" class="col-xs-4"><p><a href="docs/">Documentation</a></p></div>
                    <div style="text-align:right" class="col-sm-4"><p>Validation: <a href="http://validator.w3.org/check?uri=referer">validator.w3.org</a></p></div>
                </div>
            </div>
        </footer>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" defer></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" defer></script>
</body>

</html>
