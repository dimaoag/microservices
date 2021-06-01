<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Models\User\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\Api\User\User\CreateRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Api\User\User\UpdateRequest;
use App\Http\Requests\Api\User\User\ChangeInfoRequest;
use App\Http\Requests\Api\User\User\ChangePasswordRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        Gate::authorize('view', 'users');

        $users = User::with(['role'])->paginate(10);

        return UserResource::collection($users);
    }

    public function show(User $user): UserResource
    {
        Gate::authorize('view', 'users');

        return new UserResource($user);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        $data = $request->only('first_name', 'last_name', 'email', 'role_id') +
        ['password' => Hash::make($request->get('password'))];

        return new JsonResponse(new UserResource(User::create($data)), Response::HTTP_CREATED);
    }

    public function update(\App\Http\Requests\Api\User\User\UpdateRequest $request, User $user): JsonResponse
    {
        $user->update($request->all());

        return new JsonResponse(new UserResource($user), Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id): JsonResponse
    {
        Gate::authorize('edit', 'users');

        User::destroy($id);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    public function user(): UserResource
    {
        /** @var User $user */
        $user = Auth::user();

        return (new UserResource($user))->additional([
            'data' => [
                'permissions' => $user->permissions()
            ]
        ]);
    }

    public function changeInfo(\App\Http\Requests\Api\User\User\ChangeInfoRequest $request, User $user): JsonResponse
    {
        $user->update($request->only('first_name', 'last_name'));

        return new JsonResponse(new UserResource($user), Response::HTTP_ACCEPTED);
    }

    public function changePassword(ChangePasswordRequest $request, User $user): JsonResponse
    {
        $user->update(['password' => Hash::make($request->get('password'))]);

        return new JsonResponse(new UserResource($user), Response::HTTP_ACCEPTED);
    }
}
