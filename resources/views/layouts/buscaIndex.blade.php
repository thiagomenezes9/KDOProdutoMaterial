<!DOCTYPE html>


<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<body class="">
<div class="wrapper ">


    @section('sidebar')
        @include('layouts.partials.sidebar')
    @show


    <div class="main-panel">

        @section('navbar')
            @include('layouts.partials.navbar')
        @show

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <div class="row">
                                    <div class="left col-md-10">
                                        <h4 class="card-title">@yield('cardTitle')</h4>
                                        <p class="card-category">@yield('cardContent')</p>
                                    </div>

                                    @yield('cardButton')


                                </div>

                            </div>

                            <div class="card-body">

                                @yield('content')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <div class="row">
                                    <div class="col-md-3">
                                       <small><i class="material-icons" >filter_list</i></small>

                                    </div>

                                </div>

                            </div>

                            <div class="card-body">

                                @yield('filtro')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @section('footer')
            @include('layouts.partials.footer')
            @show


    </div>
</div>

@section('scripts')
    @include('layouts.partials.script')
    @yield('scriptlocal')
@show

</body>

</html>