<?php

declare(strict_types=1);

namespace App\Http\Requests\User\Role;

use Illuminate\Foundation\Http\FormRequest;

/** @psalm-suppress PropertyNotSetInConstructor */
class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:10',
            'permissions' => 'array',
            'permissions.*' => 'integer|distinct|exists:permissions,id',
        ];
    }
}
