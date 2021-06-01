<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\User\User;

use App\Http\Requests\Api\JsonRequest;

/** @psalm-suppress PropertyNotSetInConstructor */
class ChangePasswordRequest extends JsonRequest
{
    public function rules(): array
    {
        return [
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password'
        ];
    }
}
