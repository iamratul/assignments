<?php
namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function CreateToken($email, $userId, $role): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token', // Issuer
            'iat' => time(), // Issued At
            'exp' => time() + 60 * 60, // Expire time
            'userEmail' => $email, // User email
            'userID' => $userId, // User ID
            'role' => $role,
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function CreateTokenForSetPassword($userEmail): string
    {
        $key = env('JWT_KEY');
        $payload = [
            'iss' => 'laravel-token', // Issuer
            'iat' => time(), // Issued At
            'exp' => time() + 60 * 10, // Expire time
            'userEmail' => $userEmail, // User email
            'userID' => 0, // User ID
        ];

        return JWT::encode($payload, $key, 'HS256');
    }

    public static function VerifyToken($token): string | object
    {
        try {
            if ($token == null) {
                return 'Unauthorized';
            } else {
                $key = env('JWT_KEY');
                $decoded = JWT::decode($token, new Key($key, 'HS256'));
                return $decoded;
            }
        } catch (Exception $e) {
            return 'Unauthorized';
        }
    }
}
