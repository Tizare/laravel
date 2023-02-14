<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\Social;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as SocialUser;

class SocialService implements Social
{

    public function loginAndRedirect(SocialUser $socialUser): string
    {
        $user = User::query()->where('email', '=', $socialUser->getEmail())->first();
        if ($user === null) {
            return route('register');
        }

        if($socialUser->name !== null) {
            $user->name = $socialUser->getName();
        }

        $user->avatar = $socialUser->getAvatar();

        if ($user->save()) {
            Auth::loginUsingId($user->id);

            return route('account');
        }

        throw new \Exception('Did not save the user');
    }
}
