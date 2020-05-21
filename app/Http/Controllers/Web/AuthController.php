<?php
namespace App\Http\Controllers\Web;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:web')->except(['logout']);
    }

    public function show()
    {
        return view('web.users.login');
    }

    public function login()
    {
        $credentials = request()->validate([
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);
        $credentials['active'] = true;

        if (auth('web')->attempt(
            $credentials, request()->filled('remember')
        )) {
            return redirect()->intended(route('web.users.panel'));
        }

        error(trans('web.auth.login.messages.failed'));

        return redirect()->back()->withInput();
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect(route('web.login'));
    }

}
