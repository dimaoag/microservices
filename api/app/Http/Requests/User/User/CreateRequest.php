<?php

declare(strict_types=1);

namespace App\Http\Requests\User\User;

use Illuminate\Foundation\Http\FormRequest;

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
            'password' => 'min:6'
        ];
    }
}
