<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Progress;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    private string $user_id;

    public function __construct()
    {
        $this->user_id = auth()->user()->id;
    }

    public function index()
    {
        $timeline = Progress::with(['user:id,name'])
            ->where('user_id', $this->user_id)
            ->select('id','user_id', 'type', 'surah', 'verse', 'created_at')
            ->orderByDesc('created_at')
            ->get();


        return response()->json([
            'status' => 'success',
            'data' => $timeline
        ]);
    }

    public function delete($id)
    {
        $timeline = Progress::find($id);
        $timeline->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Timeline deleted successfully'
        ]);
    }
}
