<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>General Dashboard &mdash; Stisla</title>

 @include('template.style')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('template.topnav')
      </nav>

      <div class="main-sidebar">
        @include('template.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">

        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
            <a href="#">FARIDA PURNOMO</a>
        </div>
      </footer>
    </div>
  </div>

  @include('template.script')
</body>
</html>
