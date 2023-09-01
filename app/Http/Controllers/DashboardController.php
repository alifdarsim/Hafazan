<?php

namespace App\Http\Controllers;

use App\Services\ChapterService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected ChapterService $chapterService;

    public function __construct(ChapterService $chapterService)
    {
        $this->chapterService = $chapterService;
    }

    public function Dashboard()
    {
        $chapters = $this->chapterService->getChapter();
        return view('dashboard', [
            'chapters' => $chapters
        ]);
    }
}
