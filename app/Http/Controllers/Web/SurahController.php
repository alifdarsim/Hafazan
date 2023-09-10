<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\ChapterService;

class SurahController extends Controller
{
    protected ChapterService $chapterService;

    public function __construct(ChapterService $chapterService)
    {
        $this->chapterService = $chapterService;
    }

    public function Surah()
    {
        $chapters = $this->chapterService->getChapter();
        return view('surah.index', [
            'chapters' => $chapters
        ]);
    }

    public function SurahById($id)
    {
        $chapters = $this->chapterService->getChapter();
        return view('surah.id', [
            'id' => $id,
            'chapters' => $chapters
        ]);
    }
}
