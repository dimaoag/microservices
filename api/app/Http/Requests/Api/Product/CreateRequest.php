<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\Api\JsonRequest;

/** @psalm-suppress PropertyNotSetInConstructor */
class CreateRequest extends JsonRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'string',
            'image' => 'required|string',
            'price' => 'required|numeric'
        ];
    }
}
