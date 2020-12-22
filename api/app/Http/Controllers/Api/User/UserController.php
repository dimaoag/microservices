<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Models\User\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\User\User\CreateRequest;
use App\Http\Requests\User\User\UpdateRequest;
use App\Http\Requests\User\User\ChangeInfoRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\User\User\ChangePasswordRequest;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse(User::paginate(10));
    }

    public function show(User $user): JsonResponse
    {
        return new JsonResponse($user);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $data = $request->only('first_name', 'last_name', 'email') +
        ['password' => Hash::make($request->get('password'))];

        return new JsonResponse(User::create($data), Response::HTTP_CREATED);
    }

    public function update(UpdateRequest $request, User $user): JsonResponse
    {
        $user->update($request->all());

        return new JsonResponse($user, Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id): JsonResponse
    {
        User::destroy($id);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    public function user(): JsonResponse
    {
        return new JsonResponse(Auth::user());
    }

    public function changeInfo(ChangeInfoRequest $request, User $user): JsonResponse
    {
        $user->update($request->only('first_name', 'last_name'));

        return new JsonResponse($user, Response::HTTP_ACCEPTED);
    }

    public function changePassword(ChangePasswordRequest $request, User $user): JsonResponse
    {
        $user->update(['password' => Hash::make($request->get('password'))]);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
