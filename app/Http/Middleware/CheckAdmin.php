<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/12/16
 * Time: 上午 9:04
 */
namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Response;

class CheckAdmin
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
        $authenticated_users = $request->user();
        if ($authenticated_users->role !== User::ADMIN_ROLE) {
            return response()->view('errors.permission_denied');
        }

        return $next($request);
    }

}