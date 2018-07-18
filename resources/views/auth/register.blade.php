<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2017 00:15:57 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>KD O Produto</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="http://www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.creative-tim.com/product/material-dashboard-pro" />
    <meta property="og:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg" />
    <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design." />
    <meta property="og:site_name" content="Creative Tim" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard5438.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../../../maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="off-canvas-sidebar">
<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <strong><h2>KD O Produto</h2></strong>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                {{--<li>--}}
                {{--<a href="../dashboard.html">--}}
                {{--<i class="material-icons">mic</i> Dashboard--}}
                {{--</a>--}}
                {{--</li>--}}
                <li class="">
                    <a href="{{route('auth.register')}}">
                        <i class="material-icons">person_add</i> Register
                    </a>
                </li>
                <li class=" active ">
                    <a href="{{route('auth.login')}}">
                        <i class="material-icons">fingerprint</i> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page register-page" filter-color="black" data-image="../../assets/img/register.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-signup">

                        <div class="card-content">
                            <div class="card-header text-center" data-background-color="green">
                                <h3 class="card-title">Registro</h3>

                            </div>

                           {{--<div class="col-md-5">--}}
                            <div class="social text-center">


                                <br><br>

                                @foreach($errors->all() as $error)
                                    {{$error}}<br>
                                @endforeach
                                @if(Session::get('fail'))
                                    {{Session::get('fail')}}
                                @endif

                            </div>




                            <form class="form" method="post" action="{{route('register.create')}}">

                                {!! csrf_field() !!}

                                <input type="hidden" value="1" name="ativo">
                                <input type="hidden" value="USER" name="tipo">

                                <div class="card-content">
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                        <input type="text" value="{{old('name')}}" class="form-control" placeholder="Primeiro nome..." name="name">
                                    </div>



                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                        <input type="email" value="{{old('email')}}" class="form-control" placeholder="Email..." name="email">
                                    </div>


                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">call</i>
                                                </span>
                                        <input type="tel" value="{{old('telefone')}}" class="form-control" placeholder="Telefone..." name="telefone">
                                    </div>

                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">fingerprint</i>
                                                </span>
                                        <input type="number" value="{{old('cpf')}}" class="form-control" placeholder="CPF..." name="cpf">
                                    </div>

                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">child_friendly</i>
                                                </span>
                                        <input type="date" value="{{old('dt_nasc')}}" class="form-control" placeholder="Data Nascimento..." name="dt_nasc">
                                    </div>


                                    <div class="input-group">
                                        <span class="input-group-addon">
                                                    <i class="material-icons">child_friendly</i>
                                                </span>
                                        <select name="sexo" id="sexo" class="form-control">

                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminino">Feminino</option>

                                        </select>
                                    </div>



                                    <div class="input-group">
                                        <span class="input-group-addon">
                                                    <i class="material-icons">location_on</i>
                                                </span>
                                        <select class="form-control select2 select2-hidden-accessible" name="cidade_id" id="cidade_id" >

                                            @foreach($cidades as $cidade)

                                                <option value="{{$cidade->id}}">{{$cidade->nome}}</option>

                                                @endforeach
                                        </select>

                                        {{--<span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-lf4s-container"><span class="select2-selection__rendered" id="select2-lf4s-container" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                                    </div>








                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                        <input type="password" placeholder="Senha..." name="password" class="form-control" />
                                    </div>

                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                        <input type="password"  placeholder="Confirmar..." name="password_confirmation" class="form-control" />
                                    </div>
                                    <!-- If you want to add a checkbox to this form, uncomment this code -->
                                    {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                    {{--<input type="checkbox" name="optionsCheckboxes" checked> Eu aceito os termos e condições.--}}
                                    {{--</label>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-success btn-round">Vamos Começar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">

                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    Criado por Thiago Menezes, feito com amor por uma melhor web
                </p>
            </div>
        </footer>
    </div>
</div>
</body>

</body>
<!--   Core JS Files   -->
<script src="../../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="../../assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="../../assets/js/es6-promise-auto.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="../../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="../../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../../assets/js/jquery.sharrre.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="../../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="../../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="../../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="../../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="../../assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="../../assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard5438.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2017 00:16:34 GMT -->
</html>