<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>

    <title>{{ trans('KD O Produto') }}</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        img {
            width: 100%;
            height: auto;
        }
    </style>


</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

<div id="app" v-cloak>
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('auth.login') }}"><b>KD O Produto</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ route('auth.login') }}">Login</a></li>
                        <li><a href="{{ route('auth.register') }}">Register</a></li>
                        {{--<li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>--}}
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    {{--<h2 class="w3-center">AskLunch</h2>--}}


    <img style="width: 100%" src="{{URL::asset('/imagens/01.jpg')}}">
    <img src="{{URL::asset('/imagens/02.jpg')}}">








    <footer class="navbar navbar-default navbar-fixed-bottom">
        <div id="c">
            <div class="container">
                <p>
                    <strong>KD O Produto Copyright &copy; <?php echo date('Y')?> </strong>
                </p>
            </div>
        </div>
    </footer>

</div>
