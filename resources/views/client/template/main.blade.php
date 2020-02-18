<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <title>Workout - @yield('title','default') | Panel de administración</title>

    <body>

        @yield('navbar')


        <div class="content">
        
        @yield('content')
        
        </div>


    </body>

</html>
