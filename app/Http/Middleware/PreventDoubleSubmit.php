<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Every form carries a one-time token. The first request that uses it wins;
 * any repeat (double click, resubmit on refresh, two tabs) is rejected.
 * Cache::add() is atomic, so two simultaneous clicks cannot both pass.
 */
class PreventDoubleSubmit
{
    public static function issue(): string
    {
        return (string) Str::uuid();
    }

    public function handle(Request $request, Closure $next): Response
    {
        $token = (string) $request->input('_submit_token');

        if ($token === '' || ! Cache::add('form-token:' . $token, true, now()->addHours(2))) {
            return redirect()->back()->withInput($request->except('password', 'password_confirmation'))
                ->with('notice', 'That form was already submitted, so nothing was added twice.');
        }

        return $next($request);
    }
}
