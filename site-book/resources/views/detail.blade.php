
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Carousel Template · Bootstrap v5.0</title>





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










        /* GLOBAL STYLES
  -------------------------------------------------- */
        /* Padding below the footer and lighter body text */

        body {
            padding-top: 3rem;
            padding-bottom: 3rem;
            color: #5a5a5a;
        }


        /* CUSTOMIZE THE CAROUSEL
        -------------------------------------------------- */

        /* Carousel base class */
        .carousel {
            margin-bottom: 4rem;
        }
        /* Since positioning the image, we need to help out the caption */
        .carousel-caption {
            bottom: 3rem;
            z-index: 10;
        }

        /* Declare heights because of positioning of img element */
        .carousel-item {
            height: 32rem;
        }
        .carousel-item > img {
            position: absolute;
            top: 0;
            left: 0;
            min-width: 100%;
            height: 32rem;
        }


        /* MARKETING CONTENT
        -------------------------------------------------- */

        /* Center align the text within the three columns below the carousel */
        .marketing .col-lg-4 {
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .marketing h2 {
            font-weight: 400;
        }
        /* rtl:begin:ignore */
        .marketing .col-lg-4 p {
            margin-right: .75rem;
            margin-left: .75rem;
        }
        /* rtl:end:ignore */


        /* Featurettes
        ------------------------- */

        .featurette-divider {
            margin: 5rem 0; /* Space out the Bootstrap <hr> more */
        }

        /* Thin out the marketing headings */
        .featurette-heading {
            font-weight: 300;
            line-height: 1;
            /* rtl:remove */
            letter-spacing: -.05rem;
        }


        /* RESPONSIVE CSS
        -------------------------------------------------- */

        @media (min-width: 40em) {
            /* Bump up size of carousel content */
            .carousel-caption p {
                margin-bottom: 1.25rem;
                font-size: 1.25rem;
                line-height: 1.4;
            }

            .featurette-heading {
                font-size: 50px;
            }
        }

        @media (min-width: 62em) {
            .featurette-heading {
                margin-top: 7rem;
            }
        }

        header {padding-top:56px}



    </style>


    <!-- Custom styles for this template -->

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




    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->



        <!-- START THE FEATURETTES -->

        <h2 class="featurette-heading">{{$catalog->title}} </h2>
        <br>



        <div class="row featurette">
            <div class="col-md-7 order-md-2">

                <p class="lead">Жанр: {{ $catalog->genres->pluck('title')->join(', ') }}</p>
                <p class="lead">Автор: {{ $catalog->authors->pluck('title')->join(', ') }}</p>
                <p class="lead">{{ $catalog->text }}</p>
            </div>
            <div class="col-md-5 order-md-1">

                @isset($catalog->img)

                    <img src="/{{ $catalog->img }}">

                @endisset

                @empty($catalog->img)
                        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">нет картинки</text></svg>


                @endempty



            </div>
        </div>

        <hr class="featurette-divider">



        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">

    </footer>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


</body>
</html>
