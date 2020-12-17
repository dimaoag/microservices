<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\Controller;

class UserController extends Controller
{
    public function index (): JsonResponse
    {
        return new JsonResponse(User::all());
    }
}
