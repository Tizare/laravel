<?php

namespace App\Services\Contracts;

use Laravel\Socialite\Contracts\User as SocialUser;

interface Social
{
    /**
     * @return string
     */
    public function loginAndRedirect(SocialUser $socialUser): string;
}
