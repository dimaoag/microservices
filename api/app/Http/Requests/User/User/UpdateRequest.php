<?php

declare(strict_types=1);

namespace App\Http\Requests\User\User;

use App\Models\User\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

/** @psalm-suppress PropertyNotSetInConstructor */
class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return (bool) Gate::authorize('edit', 'users');
    }

    public function rules(): array
    {
        return [
            'first_name' => 'string|min:1',
            'last_name' => 'string',
            'role_id' => ['required', 'integer', Rule::in(Role::getList())],
        ];
    }
}
