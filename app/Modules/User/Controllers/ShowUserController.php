<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Models\User;
use Illuminate\Http\JsonResponse;

class ShowUserController
{
    public function __invoke(User $user): JsonResponse
    {
        return response()->json($user->only(['id', 'name', 'email', 'phone', 'address', 'created_at', 'settings']));
    }
}
