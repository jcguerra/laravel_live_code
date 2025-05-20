<?php

namespace App\Modules\Note\Controllers;

use App\Modules\Note\Models\Note;
use App\Modules\Note\Requests\UpdateNoteRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeleteNoteController
{
    use AuthorizesRequests;

    /**
     * @param Note $note
     * @return JsonResponse
     */
    public function __invoke(Note $note): JsonResponse
    {
        $this->authorize('delete', $note);
        $note->delete();
        return response()->json('The note was deleted', Response::HTTP_NO_CONTENT);
    }
}
