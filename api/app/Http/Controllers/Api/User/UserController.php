<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse(User::all());
    }

    public function show(User $user): JsonResponse
    {
        return new JsonResponse($user);
    }

    public function store(UserCreateRequest $request): JsonResponse
    {
        $data = $request->only('first_name', 'last_name', 'email') +
        ['password' => Hash::make($request->get('password'))];

        return new JsonResponse(User::create($data), Response::HTTP_CREATED);
    }

    public function update(UserUpdateRequest $request, User $user): JsonResponse
    {
        $user->update($request->all());

        return new JsonResponse($user, Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id): JsonResponse
    {
        User::destroy($id);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
