@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">A new task has been created</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <fieldset disabled="disabled">
                        <div class="mb-3">
                            @csrf
                          <label for="taskinfo" class="form-label">Task</label>
                          <input type="text" value="{{ $task->task }}" class="form-control" id="taskinfo" aria-describedby="emailHelp">
                          <div id="emailHelp" class="form-text">Task description</div>
                        </div>
                        <div class="mb-3">
                          <label for="dateconcluison" class="form-label">Task completion date (Limit)</label>
                          <input type="date" value="{{ $task->date_conclusion }}" class="form-control" id="dateconcluison">
                        </div>
                    </fieldset>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Previous</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
