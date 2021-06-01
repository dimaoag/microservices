<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\User\Role;

use App\Http\Requests\Api\JsonRequest;

/** @psalm-suppress PropertyNotSetInConstructor */
class RoleRequest extends JsonRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:10',
            'permissions' => 'array',
            'permissions.*' => 'integer|distinct|exists:permissions,id',
        ];
    }
}
