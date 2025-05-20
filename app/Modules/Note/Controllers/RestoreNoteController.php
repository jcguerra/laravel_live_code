<?php

namespace App\Modules\Note\Controllers;

use App\Modules\Note\Models\Note;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RestoreNoteController
{
    use AuthorizesRequests;

    /**
     * @param Note $note
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $note = Note::withTrashed()->find($id);
        $this->authorize('restore', $note);
        $note->restore();
        return response()->json($note, Response::HTTP_ACCEPTED);
    }
}
