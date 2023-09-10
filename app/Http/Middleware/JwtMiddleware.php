<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use DateTimeInterface;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use UnexpectedValueException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // get token from cookie
        $token = $request->cookie('jwt_token');

        if ($token == null) {
            return redirect('/login');
        }

        // inside jwt trait there is another way to block access to dashboard if not logged in

        return $next($request);
    }

}
