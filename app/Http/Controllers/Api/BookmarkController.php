<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    private string $user_id;

    public function __construct()
    {
        $this->user_id = auth()->user()->id;
    }

    public function index(Request $request)
    {
        // get json payload from request
        $surah = $request->surah;
        // get the count of bookmark for each verseKey and add it to the response
        return $this->getBookMark($surah);
    }

    public function key(Request $request){
        $key = $request->key;
        $surah = explode(':', $key)[0];
        $verse = explode(':', $key)[1];

        $bookmark = Bookmark::with(['user:id,name'])
            ->where('user_id', $this->user_id)
            ->where('surah', $surah)
            ->where('verse', $verse)
            ->select('id','surah', 'verse', 'user_id', 'note')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $bookmark
        ]);
    }

    public function store(Request $request)
    {
        $surah = $request->surah;
        $verse = $request->verse;
        $note = $request->note;

        Bookmark::create([
            'user_id' => $this->user_id,
            'surah' => $surah,
            'verse' => $verse,
            'note' => $note,
        ]);

        return $this->getBookMark($surah);
    }

    public function delete($id)
    {
        $bookmark = Bookmark::find($id);
        $bookmark->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Bookmark deleted'
        ]);
    }

    /**
     * @param mixed $surah
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookMark(mixed $surah): \Illuminate\Http\JsonResponse
    {
        $bookmarkCount = Bookmark::select('surah', 'verse')
            ->where('user_id', $this->user_id)
            ->where('surah', $surah)
            ->get()
            ->groupBy('verse')
            ->map(function ($item, $key) {
                return [
                    'verseKey' => $item[0]->surah . ':' . $item[0]->verse,
                    'count' => count($item)
                ];
            })->values();
        return response()->json([
            'status' => 'success',
            'data' => $bookmarkCount
        ]);
    }

}
