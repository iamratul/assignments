<?php
namespace App\Helper;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public function CreateToken($userEmail): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token', // Issuer 
            'iat' => time(),    // Issued At
            'exp' => time() + 60 * 60,    // Expire time
            'userEmail' => $userEmail // User email
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public function VerifyToken($token): string
    {
        try {
            $key = env('JWT_KEY');
        $decode = JWT::decode($token, new Key($key, 'HS256'));
        return $decode->userEmail;
        } catch (Exception $e) {
            return 'Unauthorized';
        }
    }
}