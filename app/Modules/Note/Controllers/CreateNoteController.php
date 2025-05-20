<?php

namespace App\Modules\Note\Controllers;

use App\Modules\Note\Models\Note;
use App\Modules\Note\Requests\CreateNoteRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateNoteController
{
    /**
     * @param CreateNoteRequest $request
     * @return Note
     */
    public function __invoke(CreateNoteRequest $request): JsonResponse
    {
        $note = $request->validated();
        $note['user_id'] = auth()->id();
        $note = Note::create($note);
        return response()->json($note, Response::HTTP_CREATED);

    }
}
