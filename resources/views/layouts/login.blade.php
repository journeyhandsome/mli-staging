<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>MLI Login</title>
  <link rel="stylesheet" href="{{asset('assets/site/dist/css/adminlte.min.css')}}">
</head>
<body>
    <div>
      <section class="content">
        <div class="container-fluid">
              @yield('content')
          </div>
      </section>
    </div>
</body>
</html>
