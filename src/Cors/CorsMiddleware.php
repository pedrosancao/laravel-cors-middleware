<?php

namespace PedroSancao\Cors;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as Router;

class CorsMiddleware
{

    /**
     * @var array
     */
    private $allowedDomains;

    /**
     * @var array
     */
    private $allowedHeaders;

    public function __construct()
    {
        $this->allowedDomains = array_filter(explode(',', config('cors-middleware.allowed_domains', '')));
        $this->allowedHeaders = array_filter(explode(',', config('cors-middleware.allowed_headers', '')));
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (count($this->allowedDomains) === 0) {
            return $next($request);
        }

        $origin = $request->header('Origin');

        // handle CORS pre-flight request
        if ($request->method() === 'OPTIONS') {
            $method = $request->header('Access-Control-Request-Method');
            $headers = explode(',', $request->header('Access-Control-Request-Headers'));

            return response('', 200, array_filter([
                'Access-Control-Allow-Origin' => in_array($origin, $this->allowedDomains) ? $origin : false,
                'Access-Control-Allow-Headers' => join(', ', array_intersect($headers, $this->allowedHeaders)),
                'Access-Control-Allow-Methods' => in_array($method, $this->getRouteMethods($request)) ? $method : false,
            ]));
        }

        $response = $next($request);

        if (in_array($origin, $this->allowedDomains)) {
            $response->header('Access-Control-Allow-Origin', $origin);
            $response->header('Access-Control-Allow-Credentials', 'true');
        }

        return $response;
    }

    private function getRouteMethods(Request $request)
    {
        return collect(Router::getRoutes())->filter(function(Route $route) use ($request) { 
            return $route->matches($request, false);
        })->pluck('methods')->flatten()->toArray();
    }

}
