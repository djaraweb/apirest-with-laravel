<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiController;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id','desc')->get();
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
                'title' => 'required|string',
                'completed' => 'required|boolean'
                ]);

        $task = Task::create($data);
        return response($task,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean'
            ]);

        $task->update($data);
        return response($task,200);
    }

    public function updateAll(Request $request)
    {
        $data = $request->validate([
            'completed' => 'required|boolean'
            ]);

        Task::query()->update($data);
        return response('Update', 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response('Item Deleted', 200);
    }

    public function destroyCompleted(Request $request)
    {
        $request->validate([
            'tasks' => 'required|array'
            ]);

        Todo::destroy($request->tasks);
        return response('Items Deleted', 200);
    }
}
