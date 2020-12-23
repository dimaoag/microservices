<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FileUploadRequest;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{
    public function upload(FileUploadRequest $request): JsonResponse
    {
        $file = $request->file('file');
        $fileName = Str::random(10) . '.' . $file->clientExtension();
        $url = env('APP_URL') . '/' . Storage::putFileAs('images', $file, $fileName);

        return new JsonResponse(['url' => $url], Response::HTTP_CREATED);
    }
}
