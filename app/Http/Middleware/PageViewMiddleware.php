<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PageViewMiddleware
{
    public function handle($request, Closure $next)
    {
        // Get the current route name (page name)
        $pageName = $request->route()->getName();

        // If route name is null, use the path as a fallback
        if ($pageName === null) {
            $pageName = $request->path();
        }
        DB::table('page_views')->insert([
            'page_name' => $pageName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $next($request);
    }
}
