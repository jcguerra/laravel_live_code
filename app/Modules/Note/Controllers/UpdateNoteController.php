<?php

namespace App\Modules\Note\Controllers;

use App\Modules\Note\Models\Note;
use App\Modules\Note\Requests\UpdateNoteRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UpdateNoteController
{
    use AuthorizesRequests;

    /**
     * @param UpdateNoteRequest $request
     * @param Note $note
     * @return JsonResponse
     */
    public function __invoke(UpdateNoteRequest $request, Note $note): JsonResponse
    {
        $this->authorize('update', $note);
        $note->update($request->validated());
        return response()->json($note, Response::HTTP_ACCEPTED);
    }
}
