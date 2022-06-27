<?php

namespace App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    protected function redirectTo()
    {
        
        if (auth()->user()->is_admin =="a" || auth()->user()->is_admin =="s" && auth()->user()->status=="1" )  {
           
            return '/admin';
        }
       session()->flash('success','you can login after verify by admin');
        return  '/';
    }

    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
 
    
    //facebook callBack

    public function login_page(){
        if(Auth::check()){
           session()->flash('success','you already login');
           return redirect()-back();

        }else{
            return view('front.user.login');
        }
      
      }
 public function user_register(){
        return view('front.user.register');
      }



     
    
}
