<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class LoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $hash = $request->header('hash');
        $user = User::where('hash', $hash)->first();
        if($user) {
            $request->merge(['user_id' => $user->id]);
            return $next($request);
        }
        return abort(403, 'Access denied');
    }
}
