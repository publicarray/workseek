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
    </style>
</head>
<body>
    <div class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li>{{link_to_route('employer.create', 'Register', null, array('class'=>''))}}</li>
                <li>{{link_to_route('seeker.index', 'Seeker', null, array('class'=>''))}}</li>
            </ul>
        </div>
    </div>
    <header>
        <h1 class="text-center">@yield('title')</h1>
    </header>
    <div class="container">
        @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
        @endif
    </div>
    <div class="container">
        <div class="row">
            @yield('body')
        </div>
    </div>
    <footer class="row">
        <hr>
        <div class="container">
            <div class="row">
                <div style="text-align:left" class="col-xs-4"><p>&copy; Sebastian Schmidt S2894777</p></div>
                <div style="text-align:center" class="col-xs-4"><p><a href="docs">Documentation</a></p></div>
                <div style="text-align:right" class="col-sm-4"><p>Validation: <a href="http://validator.w3.org/check?uri=referer">validator.w3.org</a></p></div>
            </div>
        </div>
    </footer>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" defer></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js" defer></script>
</body>

</html>
