<?php

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Illuminate\Http\RedirectResponse as IlluminateRedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Routing\Redirector;

class SocialProvidersController extends Controller
{
    /**
     * @param string $driver
     * @return SymfonyRedirectResponse|IlluminateRedirectResponse
     */
    public function redirect(string $driver): SymfonyRedirectResponse | IlluminateRedirectResponse
    {
        return Socialite::driver($driver)->redirect();
    }

    /**
     * @param string $driver
     * @param Social $social
     * @return Application|Redirector|IlluminateRedirectResponse
     */
    public function callback(string $driver, Social $social): Redirector | IlluminateRedirectResponse | Application
    {
        return redirect(
            $social->loginAndRedirect(Socialite::driver($driver)->user())
        );
    }
}
