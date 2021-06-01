<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Api\Auth\RegistrationRequest;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            /** @var User $user */
            $user = Auth::user();
            $token = $user->createToken('admin')->accessToken;
            $cookie = Cookie::make('jwt', $token, 60);
            $response = new JsonResponse(['token' => $token]);

            return $response->withCookie($cookie);
        }

        return new JsonResponse(['error' => 'Invalid credential!'], Response::HTTP_UNAUTHORIZED);
    }

    public function logout(): JsonResponse
    {
        $cookie = Cookie::forget('jwt');
        $response = new JsonResponse(['message' => 'success']);

        return $response->withCookie($cookie);
    }

    public function register(RegistrationRequest $request): JsonResponse
    {
        $data = $request->only('first_name', 'last_name', 'email') +
            ['password' => Hash::make($request->get('password'))];

        return new JsonResponse(User::create($data));
    }
}
