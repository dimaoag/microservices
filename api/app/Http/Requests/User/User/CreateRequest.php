<?php

declare(strict_types=1);

namespace App\Http\Requests\User\User;

use App\Models\User\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/** @psalm-suppress PropertyNotSetInConstructor */
class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
