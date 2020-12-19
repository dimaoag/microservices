<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            /** @var User $user */
            $user = Auth::user();
            $token = $user->createToken('admin')->accessToken;
            return new JsonResponse(['token' => $token]);
        }

        return new JsonResponse(['error' => 'Invalid credential!'], Response::HTTP_UNAUTHORIZED);
    }

    public function register(RegistrationRequest $request): JsonResponse
    {
        $data = $request->only('first_name', 'last_name', 'email') +
            ['password' => Hash::make($request->get('password'))];

        return new JsonResponse(User::create($data));
    }
}
