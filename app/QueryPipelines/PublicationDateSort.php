<?php

namespace App\QueryPipelines;

use Closure;

class PublicationDateSort
{
    public function handle($request, Closure $next)
    {
        if (! request()->has('publication_date')) {
            return $next($request);
        }

        return $next($request)->orderBy('publication_date', request()->input('publication_date'));
    }
}
