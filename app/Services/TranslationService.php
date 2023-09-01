<?php

namespace App\Services;

use App\Factories\ChaptersDTOFactory;

class TranslationService
{
    protected ApiCachingService $apiCachingService;
    protected ChaptersDTOFactory $chaptersDTOFactory;

    public function __construct(ApiCachingService $apiCachingService, ChaptersDTOFactory $chaptersDTOFactory)
    {
        $this->apiCachingService = $apiCachingService;
        $this->chaptersDTOFactory = $chaptersDTOFactory;
    }

    public function getTranslator(): array
    {
        // initialize the url and cache key
        $url = 'https://api.quran.com/api/v4/resources/translations';
        $cacheKey = 'translator';

        // get the data from the api
        $data = $this->apiCachingService->getApiResponse($url, $cacheKey);
        $data = $data['translations'];

        // this id is cherry-picked from the api
        $id = [131, 20, 39, 33, 109, 229];

        // get data where it id = $id from the api and in same order
        $data = array_filter($data, function ($value) use ($id) {
            return in_array($value['id'], $id);
        });

        return $data;
    }

}
