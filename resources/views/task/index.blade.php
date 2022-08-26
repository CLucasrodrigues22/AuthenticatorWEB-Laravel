@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Tasks List</h3></div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Task</th>
                            <th scope="col">Limit date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <th scope="row">{{ $task->id }}</th>
                                    <td>{{ $task->user_id }}</td>
                                    <td>{{ $task->task }}</td>
                                    <td>{{ date('d/m/Y', strtotime($task->date_conclusion)) }}</td>
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
