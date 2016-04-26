<?php

namespace App\Http\Controllers\GiaovienAuth;

use App\Giaovien;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;



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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'gv_ten' => 'required|max:255',
            'gv_magv' => 'required|max:255|unique:giaovien',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Giaovien::create([
            'gv_ten' => $data['name'],
            'gv_magv' => $data['gv_magv'],
            'password' => bcrypt($data['password']),
        ]);
    }

    
    protected $username = 'gv_magv';


    // protected $redirectPath = '/giaovien/dashboard';
    // protected $redirectTo = '/giaovien';
    protected $guard = 'giaovien';
    
    public function showLoginForm()
    {
        if (view()->exists('auth.authenticate')) {
        return view('auth.authenticate');
        }

    return view('giaovien.auth.login');
    }
}
