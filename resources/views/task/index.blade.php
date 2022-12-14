@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                  <a class="btn btn-sm btn-success" style="float: right; margin-right: 1%;" href="{{ route('task.create') }}">New Task</a>
                  <a class="btn btn-sm btn-success" style="float: right; margin-right: 1%;" href="{{ route('task.export', ['extension' => 'xlsx']) }}">Export XLSX</a>
                  <a class="btn btn-sm btn-success" style="float: right; margin-right: 1%;" href="{{ route('task.export', ['extension' => 'csv']) }}">Export CSV</a>
                  <h3>Tasks List</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Task</th>
                            <th scope="col">Limit date</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <th scope="row">{{ $task->id }}</th>
                                    <td>{{ $task->user_id }}</td>
                                    <td>{{ $task->task }}</td>
                                    <td>{{ date('d/m/Y', strtotime($task->date_conclusion)) }}</td>
                                    <td>
                                      <div class="row">
                                        <div class="col-6" style="width: 20%;">
                                          <a class="btn btn-sm btn-info" href="{{ route('task.edit', $task->id) }}">Edit</a>
                                        </div>
                                        <div class="col-6">
                                          <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="post" id="form_{{$task->id}}">
                                            @method('DELETE')
                                            @csrf
                                          </form>
                                          <a class="btn btn-sm btn-info" href="#" onclick="document.getElementById('form_{{$task->id}}').submit()">Delete</a>
                                        </div>
                                      </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <nav aria-label="Page navigation example">
                        <ul class="pagination" style="margin:0rem 20rem 0rem 20rem;">
                          <li class="page-item">
                            <a class="page-link" href="{{ $tasks->previousPageUrl() }}" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>

                          @for ($i = 1; $i <= $tasks->lastPage(); $i++)
                            <li class="page-item {{ $tasks->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $tasks->url($i) }}">{{ $i }}</a></li>
                          @endfor

                          <li class="page-item">
                            <a class="page-link" href="{{ $tasks->nextPageUrl() }}" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
