<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAPIKey
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
        // key for v1 = d6cbad7b9c095e5d
        $api_keys = array('d6cbad7b9c095e5d');

        if ($request->header('API_KEY')) {
            $api_key = $request->header('API_KEY');

            // check token
            if (in_array($api_key, $api_keys)) {
                return $next($request);
            } else {
                return response()->json([
                    'results' => 'API key is not valid',
                ]);
            }
        }

        return response()->json([
            'results' => 'Authorization failed',
        ]);
    }
}
