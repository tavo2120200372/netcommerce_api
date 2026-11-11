<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;
use App\Models\Task;

class MaxPendingTasks implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
{
    $pendingTasks = Task::where('user_id', $value)
        ->where('is_completed', 0)
        ->count();

    if ($pendingTasks >= 5) {
        $fail('El usuario ya tiene cinco tareas pendientes.');
    }
}
}
