<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>@yield('title', $title)</title>
</head>
<body>
    
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a class="navbar-brand" href="{{route('home')}}">Eilham - Challange</a>
            <a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Log Out</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
        
        </div><!-- /.container-fluid -->
      </nav>

    @yield('content')
</div>
    
</body>
</html>