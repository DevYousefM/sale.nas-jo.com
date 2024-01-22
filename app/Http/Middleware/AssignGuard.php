<?php

namespace App\Http\Middleware;

use Closure;

use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;


use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;

class AssignGuard extends BaseMiddleware
{
    use GeneralTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->header('auth-token');
        if (!$token) {
            return $this->returnError('401', 'Token not provided');
        }
        if ($guard != null) {
            auth()->shouldUse($guard); //shoud you user guard / table
            $request->headers->set('auth-token', (string) $token, true);
            $request->headers->set('Authorization', 'Bearer ' . $token, true);
            try {
                //    $user = $this->auth->authenticate($request);  //check authenticted user
                $user = JWTAuth::parseToken()->authenticate();
            } catch (TokenExpiredException $e) {
                return  $this->returnError('401', 'Unauthenticated user');
            } catch (JWTException $e) {
                return  $this->returnError('', $e->getMessage());
            }
        }
        return $next($request);
    }/* end of function */
}
