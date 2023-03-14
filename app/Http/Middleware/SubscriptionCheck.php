<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserController;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class SubscriptionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = UserController::isSubscriptionActive($request->user()->id);

        if($response === true)
            return $next($request);

        return redirect('/');
    }
}
