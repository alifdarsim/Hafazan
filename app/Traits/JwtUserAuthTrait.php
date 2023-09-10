<?php

namespace App\Traits;

use DateTimeInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use UnexpectedValueException;

trait JwtUserAuthTrait
{
    public function AuthUser($token)
    {
        if (!$token) return redirect('/login');

        try {
            $data = $this->verify($token);
            $user_id = $data->sub;
            return DB::select('select * from users where id = ?', [$user_id])[0];
        } catch (UnexpectedValueException $e) {
            // remove cookie name jwt_token and redirect to login page
            return redirect()->route('web.logout')->send();
        }
    }

    public function verify($token): object
    {
        $keys = config('jwt.secret');
        $payload = JWT::decode($token, new Key($keys, 'HS256'));
        $this->validatePayload($payload);
        return $payload;
    }

    private function validatePayload(object $payload): void
    {
        // `sub` corresponds to the `uid` of the Firebase user.
        if (empty($payload->sub)) {
            throw new UnexpectedValueException('Payload subject is empty.');
        }

        // You can also check `iat` to ensure token hasn't expired.
        $currentTime = time();
        if (isset($payload->iat) && $payload->iat > ($currentTime + 300)) {
            throw new UnexpectedValueException('Cannot handle token prior to ' . date(DateTimeInterface::ISO8601, $payload->iat));
        }
    }

}