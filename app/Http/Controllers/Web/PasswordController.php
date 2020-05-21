<?php
namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordController extends Controller
{

    public function show()
    {
        return view('web.users.forgot-password');
    }

    public function sendResetLinkEmail()
    {
        request()->validate([
            'email' => 'required|email'
        ]);

        $response = $this->broker()->sendResetLink(
            request()->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? redirect()->back()
                ->with('status', trans($response))
            : redirect()->back()
                ->withInput(request()->only('email'))
                ->withErrors(['email' => trans($response)]);
    }

    public function broker()
    {
        return Password::broker('clients');
    }

    public function showResetForm($token = null)
    {
        return view('web.users.password-reset')
            ->with(['token' => $token, 'email' => request('email')]);
    }

    public function reset()
    {
        request()->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = $this->broker()->reset(
            request()->only(
                'email', 'password', 'password_confirmation', 'token'
            ), function ($user, $password) {
                $user->password = $password;
                $user->setRememberToken(Str::random(60));
                $user->save();

                auth('web')->login($user);
            }
        );

        return $response == Password::PASSWORD_RESET
            ? redirect('/minha-conta')
                ->with('status', trans($response))
            : redirect()->back()
                ->withInput(request('email'))
                ->withErrors(['email' => trans($response)]);
    }

}
