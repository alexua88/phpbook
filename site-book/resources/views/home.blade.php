
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Album example · Bootstrap v5.0</title>




    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        header {padding-top:56px}


    </style>


</head>
<body>

<header>
    <nav class="navbar navbar-expand-md   fixed-top  navbar-dark bg-dark navbar-custom ">
        <a class="navbar-brand" href="/" rel="nofollow">BOOK</a>

        <div class="menu_container navbar-toggler"><a href="#" class="mobile_menu" rel="nofollow"><span class="navbar-toggler-icon"></span></a></div>
        <div class="collapse navbar-collapse justify-content-md-end " id="navbarsExample08">
            <ul class="navbar-nav nav-item11">

                @if(Auth::check())


                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Админка</a>
                    </li>

                @else

                    <li>
                        <a class="nav-link" href="/login">Вход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Регистрация</a>
                    </li>

                @endif




            </ul>
        </div>
    </nav>
</header>

<main>



    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


                @foreach($catalogs as $catalog)
                    <div class="col">
                        <div class="card shadow-sm">

                            @isset($catalog->img)

                                <img src="/{{ $catalog->img }}"   width="150" height="250">

                            @endisset

                            @empty($catalog->img)
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">НЕТ КАРТИНКИ</text></svg>
                                @endempty







                            <div class="card-body">
                                <h5 class="card-title">{{ $catalog->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Жанр: {{ $catalog->genres->pluck('title')->join(', ') }}</h6>
                                <h6 class="card-subtitle mb-2 text-muted">Автор:{{ $catalog->authors->pluck('title')->join(', ') }}</h6>


                                <p class="card-text">{{ Str::limit($catalog->text, 120) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('detail', ['slug'=>$catalog->slug]) }}">Подробнее</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>

</main>


<br>
<br>
<div class="container">

    <div class="row  ">

        <div class="col">

            {{ $catalogs->links('vendor.pagination.bootstrap-4') }}



        </div>
    </div>
</div>



<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>

    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>
