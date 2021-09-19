<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Events\TaskAdded;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }

    public function tasks()
    {
        return Task::all();
    }

    public function store(Request $request, Task $task)
    {
        $task = Task::create($request->all());
        // $task->fill($request); 
        // $task->user_id = $request->user();
        // $task->save();
        broadcast(new taskAdded($task))->toOthers();
        return $task;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
