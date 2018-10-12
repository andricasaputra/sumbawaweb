<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Karantina Sumbawa - @yield('title')</title>

        <!--    Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">

        <link rel="icon" type="image/png" href="{{asset('img/favicon-32x32.png')}}" sizes="32x32">

        <!--Fontawesom-->
        <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">

        <!--Animated CSS-->
        <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!--Bootstrap Carousel-->
        <link href="{{asset('css/carousel.css')}}" rel="stylesheet">

        <!--Main Stylesheet-->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <!--Responsive Framework-->
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

        <link href="{{asset('css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">

    </head>

    <body>

        @include('web.inc.navbar')
        @yield('content')
        <!--Start of footer-->
        <section id="footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="copyright">
                            <img src="{{asset('img/web-sumbawa3x.png')}}" style="width: 5%" alt="footer-logo">
                            <p>
                                 Stasiun Karantina Pertanian Kelas I Sumbawa Besar
                            </p>
                            <p>&copy; 2018</p>
                        </div>
                    </div>

                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </section>
        <!--End of footer-->

        <!--Scroll to top-->
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
        <!--End of Scroll to top-->
        <script src="{{asset('js/jquery-1.12.3.min.js')}}"></script>
        <!--Counter UP Waypoint-->
        <script src="{{asset('js/waypoints.min.js')}}"></script>
        <!--Counter UP-->
        <script src="{{asset('js/jquery.counterup.min.js')}}"></script>

        <script>
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        </script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- Custom JavaScript-->
        <script src="{{asset('js/main.js')}}"></script>

        <script src="{{asset('js/jquery.smartmenus.min.js')}}"></script>

        <script src="{{asset('js/jquery.smartmenus.bootstrap.min.js')}}"></script>
    </body>

</html>