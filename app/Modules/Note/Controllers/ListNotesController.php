<?php

namespace App\Modules\Note\Controllers;

use App\Modules\Note\Models\Note;
use App\Modules\Note\Requests\ListNotesRequest;
use Illuminate\Http\JsonResponse;

class ListNotesController
{
    public function __invoke(ListNotesRequest $request): JsonResponse
    {
        $notes = Note::query()
            ->where('user_id', auth()->id())
            ->filterByStatus($request->status)
            ->filterByDateRange($request->from, $request->to)
            ->search($request->q)
            ->applySort($request->sort)
            ->select('id', 'title', 'content', 'status', 'user_id', 'created_at')
            ->paginate(10);

        return response()->json($notes);
    }
}
