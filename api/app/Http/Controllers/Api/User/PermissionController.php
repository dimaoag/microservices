<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Models\User\Permission;
use App\Http\Controllers\Api\Controller;
use App\Http\Resources\User\PermissionResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PermissionController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $permissions = Permission::paginate(10);

        return PermissionResource::collection($permissions);
    }
}
