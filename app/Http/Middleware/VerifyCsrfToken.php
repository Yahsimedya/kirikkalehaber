<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
    protected function tokensMatch($request)
    {
        $userAgent = $request->header('User-Agent');

        if ($userAgent && preg_match('/(facebookexternalhit|Facebot|Twitterbot|Pinterest|LinkedInBot|Slackbot)/i', $userAgent)) {
            return true; // Bot ise CSRF kontrolünü atla
        }

        return parent::tokensMatch($request);
    }
}
