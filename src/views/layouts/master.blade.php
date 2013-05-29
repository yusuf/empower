<html>
<head>
    <meta charset="utf-8">
    <title>{{ isset($title) ? $title : null }}</title>
</head>
<body>

    <h1>{{ isset($title) ? $title : null }}</h1>

    @if (Session::has('success'))
        <h2>Success</h2>
        <p>{{ Session::get('success') }}</p>
    @endif

    @if ($errors->any())
        <h2>Errors</h2>
        <ul>
            {{ implode('', $errors->all('<li>:message</li>')) }}
        </ul>
    @endif

    <ul>
    @section('empower-nav')
        <li>{{ HTML::linkRoute(Config::get('empower::baseurl'), 'Main Panel') }}</li>
        @foreach(Config::get('empower::externals') as $key => $view)
            @include((($key) ? $key.'::' : null).$view)
        @endforeach
    @show
    </ul>

    @yield('body')
</body>
</html>