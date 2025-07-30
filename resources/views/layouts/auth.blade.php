<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SITA &mdash; {{ config('app.name') }}</title>
    @include('includes.style')
</head>

<body class="hold-transition login-page">
    @if(session()->has('info'))
    <div class="alert alert-primary">
        {{ session()->get('info') }}
    </div>
    @endif
    @if(session()->has('status'))
    <div class="alert alert-info">
        {{ session()->get('status') }}
    </div>
    @endif
    @yield('content')
    @include('includes.style')
</body>
</html>
