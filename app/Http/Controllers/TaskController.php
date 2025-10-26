<?php

namespace App\Http\Controllers;
use App\Models\task;
use App\Http\Requests\taskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = task::all();
        return view('tasks.index', compact('tasks'));
    }
    public function create()
    {
        return view('tasks.create');
    }
    public function store(taskRequest $request)
    {
        $myNewTask = $request->validated();

        task::create($myNewTask);

        return redirect()->route('tasks.index');
    }
    public function show($id)
    {
        $task = task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }
    public function edit($id)
    {
        $task = task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }
    public function update(taskRequest $request, $id)
    {
        $task = task::findOrFail($id);
        $updatedData = $request->validated();
        $task->update($updatedData);

        return redirect()->route('tasks.index');
    }



    public function destroy($id)
    {
        $task = task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }
}