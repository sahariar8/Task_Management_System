<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();

        // Filter by status (only apply if status is not null or empty)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by due date (optional filtering based on specific date)
        if ($request->filled('due_date')) {
            $query->whereDate('due_date', $request->due_date);
        }

        // Sort by due date (default sorting if no specific order is provided)
        $sortOrder = $request->get('sort_order', 'asc'); // Default to ascending order
        $query->orderBy('due_date', $sortOrder);

        // Paginate tasks
        $tasks = $query->paginate(10);

        return view('tasks.index', compact('tasks'));
    }



    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status' => 'required|in:Pending,In Progress,Completed',
        ]);

        $task = Task::create($request->all());

        if ($request->wantsJson()) {
            return response()->json($task, 201);
        }

        return redirect()->route('dashboard')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json($task);
        }

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'sometimes|date',
            'status' => 'sometimes|in:Pending,In Progress,Completed',
        ]);

        $task->update($request->all());

        if ($request->wantsJson()) {
            return response()->json($task);
        }

        return redirect()->route('dashboard')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Task deleted successfully.']);
        }

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully.');
    }
}
