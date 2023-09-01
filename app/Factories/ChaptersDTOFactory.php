<?php

namespace App\Factories;

use App\DTO\ChaptersDTO;

class ChaptersDTOFactory
{
    public function create(array $chapterData): ChaptersDTO
    {
        return new ChaptersDTO(
            $chapterData['id'],
            $chapterData['revelation_place'],
            $chapterData['revelation_order'],
            $chapterData['bismillah_pre'],
            $chapterData['name_simple'],
            $chapterData['name_complex'],
            $chapterData['name_arabic'],
            $chapterData['verses_count'],
            $chapterData['pages'],
            $chapterData['translated_name']['name']
        );
    }
}
