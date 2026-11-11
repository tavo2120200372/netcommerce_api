<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Company::with('tasks.user');
        if ($search !== null && $search !== '') {
            $query->where('name', 'like', "%{$search}%");
}
        $companies = $query
            ->get()
            ->map(function ($company) {
                return [
                    'id' => $company->id,
                    'name' => $company->name,
                    'tasks' => $company->tasks->map(function($task){
                        return [
                            'id' => $task->id,
                            'name' => $task->name,
                            'description' => $task->description,
                            'user' => $task->user->name,
                            'is_completed' => $task->is_completed,
                            'start_at' => $task->start_at?->format('Y-m-d H:i:s'),
                            'expired_at' => $task->expired_at?->format('Y-m-d H:i:s'),
                        ];
                    }),
                ];
            });

        return response()->json($companies);
    }
}
