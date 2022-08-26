@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>

                <div class="card-body">
                    <form method="post" action="{{ route('task.update', ['task' => $task->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                          <label for="taskinfo" class="form-label">Task</label>
                          <input type="text" name="task" value="{{ $task->task }}" class="form-control" id="taskinfo" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">Type here to edit the task</div>
                        </div>
                        <div class="mb-3">
                          <label for="dateconcluison" class="form-label">Date for conclusion</label>
                          <input type="date" name="date_conclusion" value="{{ $task->date_conclusion }}" class="form-control" id="dateconcluison">
                        </div>
                        <button type="submit" class="btn btn-primary">Update task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
