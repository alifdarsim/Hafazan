<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Progress;

class ProgressController extends Controller
{
    private string $user_id;

    public function __construct()
    {
        $this->user_id = auth()->user()->id;
    }

    public function index(Request $request)
    {
        $surah = $request->json()->all()["surah"];
        return $this->GetProgressUpdate($surah);
    }

    public function store(Request $request)
    {
        $surah = $request->surah;
        $verse = $request->verse;
        $type = $request->type;
        Progress::create([
            'user_id' => $this->user_id,
            'surah' => $surah,
            'verse' => $verse,
            'type' => $type,
        ]);
        return $this->GetProgressUpdate($surah);
    }

    /**
     * @param mixed $surah
     * @return \Illuminate\Http\JsonResponse
     */
    public function GetProgressUpdate(mixed $surah): \Illuminate\Http\JsonResponse
    {
        $progress = Progress::select('type', 'surah', 'verse')
            ->where('user_id', $this->user_id)
            ->where('surah', $surah)
            ->get();

        $mutatedCollection = $progress->groupBy('verse_key')->map(function ($grouped) {
            $result = [];
            foreach ($grouped as $item) {
                $result[$item['type']] = isset($result[$item['type']]) ? $result[$item['type']] + 1 : 1;
            }
            return array_merge(['verse_key' => $grouped[0]['verse_key']], $result);
        })->values()->toArray();

        return response()->json([
            'status' => 'success',
            'data' => $mutatedCollection
        ]);
    }
}
