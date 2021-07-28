<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$title ?? 'Curso de Laravel'}}</title>
    </head>
    <body>
        @yield('content')

        @stack('scripts')
    </body>
</html>
