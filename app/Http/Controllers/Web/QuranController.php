<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use App\Services\ChapterService;
use App\Services\TranslationService;

class QuranController extends Controller
{
    protected ChapterService $chapterService;

    public function __construct(ChapterService $chapterService)
    {
        $this->chapterService = $chapterService;
    }

    public function Chapter()
    {
        $chapters = $this->chapterService->getChapter();
        return view('chapter.index', [
            'chapters' => $chapters
        ]);
    }

    public function ChapterById($id)
    {
        $chapters = $this->chapterService->getChapter();
        return view('chapter.id', [
            'id' => $id,
            'chapters' => $chapters
        ]);
    }
}
