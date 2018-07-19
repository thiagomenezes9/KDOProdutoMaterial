<div class="sidebar" data-color="green" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        {{--  <a href="http://www.kdoproduto.com.br" class="simple-text logo-mini">
              KDO
          </a>--}}

        <a href="http://www.kdoproduto.com.br" class="simple-text logo-normal">
            KD O Produto
        </a>
    </div>
    <div class="sidebar-wrapper">
          <div class="user">
              <div class="photo">
                  @if(isset(Auth::user()->foto))
                         <img src="{{Auth::user()->foto}}" alt="../assets/img/faces/avatar.jpg">
                      @else

                  @endif
              </div>
              <div class="user-info">
                  <a data-toggle="collapse" href="#collapseExample" class="username">
                      <span>
                         {{Auth::user()->name}}
                        <b class="caret"></b>
                      </span>
                  </a>
                  <div class="collapse" id="collapseExample">
                      <ul class="nav">
                          <li class="nav-item">
                              <a class="nav-link" href="{{route('perfil')}}">
                                  <span class="sidebar-normal"> Meu Perfil </span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{route('auth.logout')}}">
                                  <span class="sidebar-normal"> Sair </span>
                              </a>
                          </li>

                      </ul>
                  </div>
              </div>
          </div>
        <ul class="nav">

            @if(Auth::user()->tipo == 'ADMIN')
                <li class="nav-item  ">
                    <a class="nav-link" href="{{route('produtos.index')}}">
                        <i class="fa fa-barcode"></i>
                        <span>Produtos</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('usuarios.index')}}">
                        <i class="fa fa-users"></i>
                        <span>Usuarios</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('cidades.index')}}">
                        <i class="fa fa-map"></i>
                        <span>Cidades</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('estados.index')}}">
                        <i class="fa fa-flag"></i>
                        <span>Estados</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{route('pais.index')}}">
                        <i class="fa fa-globe"></i>
                        <span>Paises</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('estabelecimentos.index')}}">
                        <i class="fa fa-strikethrough"></i>
                        <span>Estabelecimentos</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('precos.index')}}">
                        <i class="fa fa-barcode"></i>
                        <span>Preços</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('ofertas.index')}}">
                        <i class="fa fa-balance-scale"></i>
                        <span>Ofertas</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('marcas.index')}}">
                        <i class="fa fa-tag"></i>
                        <span>Marca</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('segmentos.index')}}">
                        <i class="fa fa-folder-open"></i>
                        <span>Segmento</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('categorias.index')}}">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Categoria</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('relatorios')}}">
                        <i class="fa fa-file-pdf-o"></i>
                        <span>Relatorios</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>

                </li>
            @endif


            @if(Auth::user()->tipo == 'LOJA')
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('precos.index')}}">
                        <i class="fa fa-barcode"></i>
                        <span>Meus Produto</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('ofertas.index')}}">
                        <i class="fa fa-balance-scale"></i>
                        <span>Minhas Ofertas</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('estabelecimentos.edit',Auth::user()->supermercado->id)}}">
                        <i class="fa fa-users"></i>
                        <span>Meu Cadastro</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('relatorios')}}">
                        <i class="fa fa-file-pdf-o"></i>
                        <span>Relatorios</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
            @endif
            @if(Auth::user()->tipo == 'USER')
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('interesse.index')}}">
                        <i class="fa fa-heart"></i>
                        <span>Meus Interreses</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('acesso.index')}}">
                            <i class="fa fa-heart"></i>
                            <span>Meus Acessos</span>
                            {{--<i class="fa fa-angle-left pull-right"></i>--}}
                        </a>
                    </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="fa fa-heart"></i>
                        <span>Ofertas</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('perfil')}}">
                        <i class="fa fa-users"></i>
                        <span>Meus Dados</span>
                        {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    </a>
                </li>
            @endif


            <li class="nav-item ">
                <a class="nav-link" href="{{route('sugestao.index')}}">
                    <i class="material-icons">unarchive</i>
                    <p>Sugestões</p>
                </a>
            </li>
        </ul>
    </div>
</div>
