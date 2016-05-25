<?php

namespace app\Http\Middleware;

use App\Models\Event;
use Closure;

class GeneralChecks
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Show message to IE 8 and before users
        if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/(?i)msie [2-8]/', $_SERVER['HTTP_USER_AGENT'])) {
            Session::flash('message', 'Please update your browser. This application requires a modern browser.');
        }

        $response = $next($request);

        return $response;
    }
}
