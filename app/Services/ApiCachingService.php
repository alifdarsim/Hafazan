<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ApiCachingService
{
    public function getApiResponse($url, $cacheKey, $expiration = null)
    {
        $cachedData = Cache::get($cacheKey);

        if ($cachedData) {
            return $cachedData;
        }
        $response = Http::get($url);

        if ($response->successful()) {
            $responseData = $response->json();
            Cache::put($cacheKey, $responseData, $expiration ?? now()->addHour());
            return $responseData;
        }

        return null;
    }
}
