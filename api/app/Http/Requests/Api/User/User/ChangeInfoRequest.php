<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\User\User;

use App\Http\Requests\Api\JsonRequest;

/** @psalm-suppress PropertyNotSetInConstructor */
class ChangeInfoRequest extends JsonRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'string|min:1',
            'last_name' => 'string',
        ];
    }
}
