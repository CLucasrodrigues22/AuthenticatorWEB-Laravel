@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Task</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('task.store') }}">
                        <div class="mb-3">
                            @csrf
                          <label for="taskinfo" class="form-label">Task</label>
                          <input type="text" name="task" class="form-control" id="taskinfo" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">Type here a new task</div>
                        </div>
                        <div class="mb-3">
                          <label for="dateconcluison" class="form-label">Date for conclusion</label>
                          <input type="date" name="date_conclusion" class="form-control" id="dateconcluison">
                        </div>
                        <button type="submit" class="btn btn-success">Create Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
