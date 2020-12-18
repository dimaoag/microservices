<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return new JsonResponse(User::all());
    }

    public function show(User $user): JsonResponse
    {
        return new JsonResponse($user);
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        return new JsonResponse(User::create($data), Response::HTTP_CREATED);
    }

    public function update(Request $request, User $user): JsonResponse
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user->update($data);

        return new JsonResponse($user, Response::HTTP_ACCEPTED);
    }

    public function destroy(int $id): JsonResponse
    {
        User::destroy($id);
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
