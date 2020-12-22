<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Models\User\Role;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\User\Role\RoleRequest;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse(Role::all());
    }

    public function show(Role $role): JsonResponse
    {
        return new JsonResponse($role);
    }

    public function store(RoleRequest $request): JsonResponse
    {
        return new JsonResponse(Role::create($request->only('name')), Response::HTTP_CREATED);
    }

    public function update(RoleRequest $request, Role $role): JsonResponse
    {
        $role->update($request->only('name'));

        return new JsonResponse($role, Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id): JsonResponse
    {
        Role::destroy($id);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
