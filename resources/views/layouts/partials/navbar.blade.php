<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">

            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                    <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                    <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                </button>
            </div>

            <a class="navbar-brand" href="#">@yield('menu_titulo')</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form" action="{{route('BuscaPersonal')}}" method="get" enctype="multipart/form-data">
                {{--<input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>--}}
                <div class="input-group no-border">
                    <input type="text" name="termo" id="termo" value="" class="form-control" placeholder="Produto...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">


                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>

                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                        <div class="ripple-container"></div></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('perfil')}}">
                        <i class="material-icons">face</i>Perfil</a>
                        <a class="dropdown-item" href="{{route('auth.logout')}}">
                            <i class="material-icons">exit_to_app</i>Sair</a>

                    </div>
                </li>


            </ul>
        </div>
    </div>
</nav>