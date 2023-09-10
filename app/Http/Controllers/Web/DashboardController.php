<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Middleware\JwtMiddleware;
use App\Services\ChapterService;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use App\Traits\JwtUserAuthTrait;
class DashboardController extends Controller
{
    use JwtUserAuthTrait;

    protected ChapterService $chapterService;

    public function __construct(Request $request, ChapterService $chapterService)
    {
        $this->AuthUser($request->cookie('jwt_token'));
        $this->chapterService = $chapterService;
    }

    public function Dashboard(Request $request)
    {
//        $user_id = $request->get('user');
//        dd($user_id);

        $chapters = $this->chapterService->getChapter();
        return view('dashboard', [
            'chapters' => $chapters
        ]);
    }

//    public function getUserData($token){
//        $keys = env('JWT_SECRET');
//        $payload = JWT::decode($token, new Key($keys, 'HS256'));
//        return $payload;
//    }
}
