<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Connect With Social Media
    </title>

    <!-- STYLES SECTION -->
    {!! Html::style('https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/app.css') !!}

</head>

<!-- BODY SECTION -->
<body>

    @yield('content')

<!-- JS SECTION  -->
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js') !!}
{!! Html::script('https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js') !!}
{!! Html::script('assets/js/plugins/typed.js') !!}
{!! Html::script('assets/js/app.js') !!}

</body>
</html>
