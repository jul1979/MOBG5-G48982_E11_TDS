<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/js/script.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NOM DU PROJET- @yield('title','GESTION DES COMMITS')</title>
</head>
<style>

</style>

<body>
<header id="pageHeader" style="text-align: center">
    <span>
      <img src="{{asset('images/esi_logo.png')}}" alt="ESI LOGO">
    </span>
    <h3>
        WEB II-GESTION DES COMMITS
    </h3>

</header>
<article id="mainArticle">
    <h2> @yield('maintitle','')</h2>
    <div class="container">
        @yield('content')
    </div>
</article>
<nav id="mainNav">
    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('repos.index')}}">Dépôts</a>
        </li>

    </ul>
</nav>
<footer id="pageFooter" style="text-align: center;background: #00BFFF;font-weight: 700">WEBG4-WEBII-48982-NRI
</footer>
</body>
