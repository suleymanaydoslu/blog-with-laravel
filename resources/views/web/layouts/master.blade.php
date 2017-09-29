<!doctype html>
<html lang="en">
<head>
  @include('web.blocks.head')
</head>
<body>
  <div class="container">
    @yield('content')

    @include('web.blocks.footer')
  </div>

  @include('web.blocks.scripts')


</body>
</html>
