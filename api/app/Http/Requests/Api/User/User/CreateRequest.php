<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\User\User;

use App\Models\User\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Api\JsonRequest;

/** @psalm-suppress PropertyNotSetInConstructor */
class CreateRequest extends JsonRequest
{
    public function authorize(): bool
    {
        return (bool) Gate::authorize('edit', 'users');
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'string',
            'email' => 'email|unique:users,email',
            'role_id' => ['required', 'integer', Rule::in(Role::getList())],
            'password' => 'min:6'
        ];
    }
}
