<?php

function getCurrentHashedUrl(): string
{
    $url = request()->url();
    $queryParams = request()->query();
    ksort($queryParams);
    $queryString = http_build_query($queryParams);
    $fullUrl = "{$url}?{$queryString}";

    return sha1($fullUrl);
}
