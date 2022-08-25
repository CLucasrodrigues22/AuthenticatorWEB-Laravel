<?php

namespace App\Http\Controllers;

use App\Models\TaskModel;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //verify authenticated user
        if (auth()->check()) {
            $id = auth()->user()->id;
            $name = auth()->user()->name;
            $email = auth()->user()->email;
            return "ID: $id | Name: $name | Email: $email";
        } else {
            return "Erro";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taskModel = TaskModel::create($request->all());
        return redirect()->route('task.show', ['task' => $taskModel->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskModel  $task
     * @return \Illuminate\Http\Response
     */
    public function show(TaskModel $task)
    {
        dd($task->getAttributes());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskModel $taskModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskModel $taskModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskModel $taskModel)
    {
        //
    }
}
