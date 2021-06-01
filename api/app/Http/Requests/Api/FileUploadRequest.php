<?php

declare(strict_types=1);

namespace App\Http\Requests\Api;

/** @psalm-suppress PropertyNotSetInConstructor */
class FileUploadRequest extends JsonRequest
{
    public function rules(): array
    {
        return [
            'file' => 'required|file|image',
        ];
    }
}
