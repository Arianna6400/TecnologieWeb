<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"  href="{{asset('css/stile.css')}}">

    <title>@yield('title', 'Catalogo')</title>
  </head>
       @guest
       <body style="background-image: url(images/Geometric2.png);">
       @endguest

        @can('isLocatore')
        <body style="background-image: url(images/colored.png);">
        @endcan

        @can('isLocatario')
        <body style="background-image: url(images/Geometric3.png);">
        @endcan

        @can('isAdmin')
        <body style="background-image: url(images/Geometric2.png);">
        @endcan
    <div >
      @guest
        @include('layouts/navbar')
      @endguest
      @can('isLocatore')
        @include ('layouts/_navlocatore')
      @endcan
      @can('isLocatario')
        @include ('layouts/_navlocatario')
      @endcan
      @can('isAdmin')
        @include ('layouts/_navadmin')
      @endcan

    </div>
    <div >
        @yield('content')
    </div>

    <div class="container-fluid">
        @include('layouts/footer')
    </div>

  </body>
</html>
