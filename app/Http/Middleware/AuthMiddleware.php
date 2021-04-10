<?php

namespace App\Http\Middleware;

use Closure;

class AuthMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        if(!$token) {
            return response()->json('No token provided', 401);
        }

        if($this->validateToken($token)) {
            return $next($request);
        } else {
            return response()->json('Token is not valid', 401);
        }
    }

    public function validateToken($token)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', env('AUTH_URI').'api/v1/validate', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token
                ],
                'http_errors' => false
            ]);
            if($response->getStatusCode()==200) {
                return true;
            } else {
                return false;
            }
        }
        catch(\Exception $e) {
            throw $e;
        };
    }
}

?>