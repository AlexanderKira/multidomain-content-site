<?php

namespace App\Http\Middleware\Custom;

use App\Models\Website;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MultiDomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $domain = $request->getHost();
        $tenant = Website::where('domain', $domain)->firstOrFail();

        $request->merge([
            'domain' => $domain,
            'tenant' => $tenant
        ]);

        return $next($request);
    }
}
