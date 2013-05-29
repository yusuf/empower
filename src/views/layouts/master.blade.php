<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    @if ($errors->any())
        <h2>Errors</h2>
        <ul>
            {{ implode('', $errors->all('<li>:message</li>')) }}
        </ul>
    @endif

    @yield('body')
</body>
</html>