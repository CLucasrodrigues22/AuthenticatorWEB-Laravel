<?php

namespace App\Http\Controllers;

use App\Mail\TaskAlertMail;
use App\Models\TaskModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $user_id = auth()->user()->id;
            $tasks = TaskModel::where('user_id', $user_id)->paginate(5);
            return view('task.index', ['tasks' => $tasks]);
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
        $datas = $request->all();
        $datas['user_id'] = auth()->user()->id;
        $taskModel = TaskModel::create($datas);
        $recipient = auth()->user()->email; // session user email address 
        Mail::to($recipient)->send(new TaskAlertMail($taskModel));
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
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskModel $task)
    {
        $user_id = auth()->user()->id;
        if ($task->user_id == $user_id) {
            return view('task.edit', ['task' => $task]);
        }

        return view('access-denied');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskModel $task)
    {
        $user_id = auth()->user()->id;
        if ($task->user_id == $user_id) {
            $task->update($request->all());
            return redirect()->route('task.index', ['task' => $task->id]);
        }

        return view('access-denied');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskModel  $taskModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskModel $task)
    {
        $user_id = auth()->user()->id;
        if ($task->user_id == $user_id) {
            $task->delete();
            return redirect()->route('task.index');
        }

        return view('access-denied');
    }
}
