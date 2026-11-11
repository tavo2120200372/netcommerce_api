<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Rules\MaxPendingTasks;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'user_id' => ['required', 'integer', 'exists:users,id', new MaxPendingTasks()],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $task = Task::create($validated);
        $task->load(['company', 'user']);
        return response()->json([
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'user' => $task->user->name,
            'company' => [
                'id' => $task->company->id,
                'name' => $task->company->name,
            ],

        ], 201);
    }
}
