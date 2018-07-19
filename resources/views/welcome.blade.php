<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        KD O Produto
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                KD O Produto
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active  ">
                    <a class="nav-link" href="{{route('auth.login')}}">
                        <i class="material-icons">fingerprint</i>
                        <p>Login</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('auth.register')}}">
                        <i class="material-icons">person_add</i>
                        <p>Register</p>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand">KD O Produto</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <form class="navbar-form" action="{{route('busca.store')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                        <div class="input-group no-border">
                            <input type="text" id="termo" name="termo" value="" class="form-control" placeholder="Produto...">
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">


                    <img style="width: 100%" src="{{URL::asset('/imagens/01.jpg')}}">
                    <img style="width: 100%" src="{{URL::asset('/imagens/02.jpg')}}">


                </div>


            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">

                <div class="copyright float-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, criado com <i class="material-icons">favorite</i> por
                    <a href="https://www.kdoproduto.com.br" target="_blank">KD O Produto</a>.
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chartist JS -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

    });
</script>
</body>

</html>