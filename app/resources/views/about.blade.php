<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>О нас</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets\css\cover.css') }}" rel="stylesheet">
  </head>

  <body class="text-center">

    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="{{ route('login') }}">Войти</a>
            <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
          </nav>
        </div>
      </header>
      <main role="main" class="inner cover">
        <h1 class="cover-heading">Добро пожаловать <br> на наш сайт!</h1>
        <p class="lead">Тут какой-то текст, рассказывающий, какие мы прикольные и&nbspклассные.</p>
        <p class="lead">
          <a href="{{ route('news') }}" class="btn btn-lg btn-secondary">Перейти к новостям</a>
        </p>
      </main>
      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Все права защищены.</p>
        </div>
      </footer>

    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets\js\jquery-3.2.1.slim.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{ asset('assets\js\popper.min.js') }}"></script>
    <script src="{{ asset('assets\js\bootstrap.min.js') }}"></script>
  </body>
</html>
