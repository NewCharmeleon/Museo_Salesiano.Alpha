<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;


    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

       protected function getLogin()
    {
        return view("auth.login");
    }


       

        public function postLogin(Request $request)
   {
    $this->validate($request, [
        'username' => 'required',
        'password' => 'required',
    ]);
    //$usuarios = $request ->input("username");


    $credentials = $request->only('username', 'password');

    if ($this->auth->attempt($credentials, $request->has('remember')))
    {
        return view("layout");// ,['username' => $usuarios]);
    }

    return "credenciales incorrectas";

    }


//login

 //registro   


        protected function getRegister()
    {
        return view("auth.register");
    }


        

        protected function postRegister(Request $request)

   {
    $this->validate($request, [
            'personas_id' => 'required|exists:personas,id|numeric|min:1|max:11',
            'perfil_id' => 'required|exists:perfil,id|numeric|min:1|max:13',
            'username' => 'required|regex:/^[\s\'\pLñÑáéíóúÁÉÍÓÚüÜçÇ]+$/|min:3|max:30',
            'email' => 'required|email|max:100',
            'password' => 'required|alpha_num|min:10|max:10',
            // 'username' => 'required',
        //'email' => 'required',
        //'password' => 'required',
    ]);


    $data = $request;


    $user=new User;
    $user->personas_id=$data['personas_id'];
    $user->perfil_id=$data['perfil_id'];
    $user->username=$data['username'];
    $user->email=$data['email'];
    $user->password=bcrypt($data['password']);


    if($user->save()){

         return "se ha registrado correctamente el usuario";
               
    }
   

   

}

//registro

protected function getLogout()
    {
        $this->auth->logout();

        Session::flush();

        return redirect('login');
    }






}
