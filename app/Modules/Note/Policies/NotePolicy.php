<?php

namespace App\Modules\Note\Policies;

use App\Modules\Note\Models\Note;
use App\Modules\User\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the note.
     */
    public function update(User $user, Note $note): bool
    {
        return $user->id === $note->user_id;
    }

    /**
     * Determine whether the user can delete the note.
     */
    public function delete(User $user, Note $note): bool
    {
        return $user->id === $note->user_id;
    }

    /**
     * Determine whether the user can restore the note.
     */
    public function restore(User $user, Note $note): bool
    {
        return $user->id === $note->user_id;
    }
}
