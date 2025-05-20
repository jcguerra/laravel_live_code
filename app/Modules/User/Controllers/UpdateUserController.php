<?php

namespace App\Modules\User\Controllers;

use App\Modules\User\Models\User;
use App\Modules\User\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\JsonResponse;

class UpdateUserController
{
    public function __invoke(UpdateUserRequest $request, User $user): JsonResponse
    {
        Gate::authorize('update', $user);

        $user->update($request->only(['name', 'phone', 'address', 'settings']));

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'user'    => $user->only(['id', 'name', 'email', 'phone', 'address', 'settings']),
        ]);
    }
}
