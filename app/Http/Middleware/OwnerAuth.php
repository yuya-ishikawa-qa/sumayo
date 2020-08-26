<?php

namespace App\Http\Middleware;

use Closure;

class OwnerAuth
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
        if (auth()->check() && auth()->user()->is_owner == 1) {
            return $next($request);
        }

        // 店員の場合は管理画面トップ画面へリダイレクト
        return redirect ('/stores');
    }

}
