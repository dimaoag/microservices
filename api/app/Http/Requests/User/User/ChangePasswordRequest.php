<?php

declare(strict_types=1);

namespace App\Http\Requests\User\User;

use Illuminate\Foundation\Http\FormRequest;

/** @psalm-suppress PropertyNotSetInConstructor */
class ChangePasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password'
        ];
    }
}
