<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Models\User\Role;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\User\RoleResource;
use App\Http\Requests\User\Role\RoleRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RoleController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return RoleResource::collection(Role::all());
    }

    public function show(Role $role): RoleResource
    {
        return new RoleResource($role);
    }

    public function store(RoleRequest $request): JsonResponse
    {
        $role = Role::create($request->only('name'));
        $permissions = $request->get('permissions');

        foreach ($permissions as $permissionId) {
            $role->permissions()->attach([
                'permission_id' => $permissionId
            ]);
        }

        return new JsonResponse(new RoleResource($role), Response::HTTP_CREATED);
    }

    public function update(RoleRequest $request, Role $role): JsonResponse
    {
        $role->update($request->only('name'));
        $permissions = $request->get('permissions');
        $role->permissions()->sync($permissions);

        return new JsonResponse(new RoleResource($role), Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id): JsonResponse
    {
        Role::destroy($id);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
