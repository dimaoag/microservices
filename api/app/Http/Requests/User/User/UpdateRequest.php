<?php

declare(strict_types=1);

namespace App\Http\Requests\User\User;

use Illuminate\Foundation\Http\FormRequest;

/** @psalm-suppress PropertyNotSetInConstructor */
class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'string|min:1',
            'last_name' => 'string',
        ];
    }
}
