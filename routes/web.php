<?php




Route::get('/', array('as' => 'auth.index', 'uses' => 'AuthController@index'));

Route::get('/home',array('as' => 'home', 'uses' => 'DashboardController@index'));






Route::group(['middleware'=>['web']],function(){
    Route::group(['prefix' => 'auth'], function (){

        Route::get('login',array('as' => 'auth.login', 'uses' => 'AuthController@login'));
        Route::post('login',array('as' => 'login.attempt', 'uses' => 'AuthController@attempt'));




        Route::get('register',array('as' => 'auth.register', 'uses' => 'AuthController@register'));
        Route::post('register',array('as' => 'register.create', 'uses' => 'AuthController@create'));


        Route::get('logout',array('as'=>'auth.logout', 'uses'=>'AuthController@logout'));



    });

    Route::group(['prefix' => 'dashboard','middleware'=>'auth'],function (){
        Route::get('/',array('as' => 'dashboard', 'uses' => 'DashboardController@index'));


    });

    Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset','Auth\ResetPasswordController@reset');




    Route::get('/perfil',array('as' => 'perfil', 'uses' => 'DashboardController@perfil'));


    Route::get('listEstados/{id}', 'AjaxController@listEstados');
    Route::get('listCidades/{id}', 'AjaxController@listCidades');
    Route::get('allCidades', 'AjaxController@allCidades');



    Route::get('alerta/{id}', 'AvisoController@criar');


    Route::group(['middleware'=>'auth'],function(){




        Route::resource('pais','PaisController');
        Route::resource('estados','EstadoController');
        Route::resource('cidades','CidadeController');


        Route::resource('marcas','MarcaController');
        Route::resource('categorias','CategoriaController');
        Route::resource('segmentos','SegmentoController');
        Route::resource('produtos','ProdutoController');
        Route::resource('usuarios','UserController');
        Route::resource('estabelecimentos','SupermercadoController');
        Route::resource('sugestao','SugestaoController');
        Route::resource('precos','PrecoController');
        Route::resource('ofertas','OfertaController');
        Route::resource('busca','BuscaController');
        Route::resource('interesse','InteresseController');
        Route::resource('acesso','AcessoController');
        Route::resource('aviso','AvisoController');


        Route::get('busca','BuscaController@busca')->name('BuscaPersonal');
        Route::get('buscamarca/{id}', 'BuscaController@listmarca');
        Route::get('buscacategoria/{id}', 'BuscaController@listcategoria');
        Route::get('menorValor/{id}', 'BuscaController@menorValor');



    Route::get('interesse/remover/{id}','InteresseController@remover')->name('InteresseRemover');
    Route::get('interesse/adicionar/{id}','InteresseController@adicionar')->name('InteresseAdicionar');



    Route::get('relatorios', 'RelatorioController@exibirOpcoesRelatorio')->name('relatorios');
    Route::post('relatorioSelecionado', 'RelatorioController@index');


        Route::get('campanhas', 'CampanhaController@campanha')->name('campanhas');
        Route::post('campanhaSelecionado', 'CampanhaController@index');

    });


});
