<?php

namespace App\Modules\Note\Controllers;

use App\Modules\Note\Models\Note;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class GetNoteController
{
    use AuthorizesRequests;

    /**
     * @param Note $note
     * @return JsonResponse
     */
    public function __invoke(Note $note): JsonResponse
    {
        $this->authorize('view', $note);
        return response()->json($note, Response::HTTP_OK);
    }
}
