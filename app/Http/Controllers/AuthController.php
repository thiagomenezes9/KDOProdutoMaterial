<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Publicacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }


    public function login(){

        return view('auth.login');

    }

    public function index(){

        return view('welcome');
    }


    public function register(){

        $cidades = Cidade::all();


        return view('auth.register',compact('cidades'));
    }



    public function attempt(Request $request){
        $this->validate($request,[
            'email' => ['required','max:255','email'],
            'password'=>['required','min:6','max:255']

        ]);


        $credentials = $request->only('email','password');

        $remember = $request->has('remember');

        if(!Auth::attempt($credentials, $remember)){
            return redirect()->back()->with('fail','Usuário ou senha inválidos')->withInput();
        }



        return redirect('dashboard');



    }


    public function create(Request $request){
        $this->validate($request,[
            'email' => ['required','max:255','email','unique:users'],
            'password'=>['required','min:6','max:255','confirmed'],
            'name'=>['required','max:255'],
            'telefone'=>['required','max:12'],
            'cidade_id'=>'required'

        ]);


        $credentials = array_merge($request->all(),['password'=>bcrypt($request->input('password'))]);
        User::create($credentials);

        return redirect('auth/login');


    }



    public function logout(){
        Auth::logout();

        return redirect('auth/login');
    }
////
////
////
    public function perfil(){
        $usuario = Auth::user();

//        dd($usuario);
        return view('user.perfil',compact('usuario'));
    }

}
