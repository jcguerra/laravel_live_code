<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Models\User;
use Illuminate\Http\JsonResponse;

class GetUsersController
{
    public function __invoke(): JsonResponse
    {
        $users = User::select('id', 'name', 'email', 'phone', 'address', 'created_at', 'settings')
                     ->orderBy('name')
                     ->paginate(10);

        return response()->json($users);
    }
}
