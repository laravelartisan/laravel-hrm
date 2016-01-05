<?php

namespace Erp\Http\Controllers\Login;

use Erp\Models\User\User;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Closure;
use Erp\Http\Requests;
use Erp\Http\Controllers\Controller;
use Erp\Models\Email\Email;
use Erp\Models\Password\Password;
use Erp\Http\Requests\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;

class LoginController extends Controller
{

    use RedirectsUsers;

    /*
         *
         * @newly added properties
         *
         * $redirectPath works when u r registered or logged in successfully
         *
         * $loginPath works after unsccesfull try to log in
         *
         */
    protected $redirectPath = 'employee';
    protected $loginPath = 'auth/login';
    private $user;
    private $request;
    private $auth;
    public function __construct(User $user,Request $request, Guard $auth)
    {
        $this->middleware('role:Admin', ['only' => ['roleCheck']]);
        $this->user = $user;
        $this->request = $request;
        $this->auth = $auth;
    }

    /**
     * @param Validator $validatedRequest
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(Validator $validatedRequest)
    {
        if($this->auth->guest()){
            if (Auth::attempt($this->credentials($validatedRequest)/*,$validatedRequest->has('remember')*/)) {
                return redirect()->intended('auth/role');
            }
            return back()->withErrors('Sorry !!! your email or password is invalid');
        }
        return redirect()->to('auth/role');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function signInForm()
    {
        return view('default.auth.signin');

    }

    /**
     * @param Validator $validatedRequest
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function signin(Validator $validatedRequest )
    {
        if($this->auth->guest()){
            if (Auth::attempt($this->credentials($validatedRequest)/*,$validatedRequest->has('remember')*/)) {
                return redirect()->intended($this->redirectPath());
            }
            return back()->withErrors('Sorry !!! your email or password is invalid');
        }
    }

    /**
     * @return string
     */
    public function loginUsername()
    {
        return property_exists($this, 'username') ? $this->username : 'email';
    }

    /**
     * @param $validatedRequest
     * @return array
     */
    public function credentials($validatedRequest){

        return [
                $this->loginUsername() => $validatedRequest->email,
                'password' => $validatedRequest->password/*,'status'=>'active'*/
        ];
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function roleCheck()
    {
        return redirect()->intended('admin');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if($this->auth->check())
            Auth::logout();
        return redirect()->to('/');
    }

}
