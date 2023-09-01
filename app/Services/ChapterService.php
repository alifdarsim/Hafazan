<?php

namespace App\Services;

use App\Factories\ChaptersDTOFactory;

class ChapterService
{
    protected ApiCachingService $apiCachingService;
    protected ChaptersDTOFactory $chaptersDTOFactory;

    public function __construct(ApiCachingService $apiCachingService, ChaptersDTOFactory $chaptersDTOFactory)
    {
        $this->apiCachingService = $apiCachingService;
        $this->chaptersDTOFactory = $chaptersDTOFactory;
    }

    public function getChapter(): array
    {
        // initialize the url and cache key
        $url = 'https://api.quran.com/api/v4/chapters?language=en';
        $cacheKey = 'chapters';

        // get the data from the api
        $data = $this->apiCachingService->getApiResponse($url, $cacheKey);
        $data = $data['chapters'];

        // create the Chapters DTOs
        $chaptersDto = [];
        foreach ($data as $chapterData) {
            $chapterDto = $this->chaptersDTOFactory->create($chapterData);
            $chaptersDto[] = $chapterDto;
        }
        return $chaptersDto;
    }

}
