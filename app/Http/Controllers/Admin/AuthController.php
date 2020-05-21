<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Flash;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout']);
    }

    public function show()
    {
        return view('admin.users.login');
    }

    public function login()
    {
        $credentials = request()->validate([
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);

        if (Auth::guard('admin')->attempt(
            $credentials, request()->filled('remember')
        )) {
            return redirect()->intended(route('admin.dashboard'));
        }

        Flash::error(trans('admin.auth.login.messages.failed'));
        return redirect()->back()->withInput(request()->all());
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

}
