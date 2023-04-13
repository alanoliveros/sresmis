<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request){
        $credentials = $request->validate(
            [
                'email'=>'required',
                'password'=>'required',
            ]
            );
            if(Auth::attempt($credentials)){

                $user_role = Auth::user()->role;
               switch ($user_role) {
                case 0:
                    Auth::logout();
                    return redirect('/login');
                    break;
                case 1:
                    return to_route('sresmis.admin.dashboard');
                    break;
                case 2:
                    return to_route('sresmis.teacher.dashboard');
                    break;
                case 3:
                    return to_route('sresmis.student.dashboard');
                    break;
                case 4:
                    return to_route('sresmis.parent.dashboard');
                    break;
                
                default:
                        Auth::logout();
                        return redirect('/login');
                        break;
               }

            }else{
                return redirect('/login');
            }


    }
}
