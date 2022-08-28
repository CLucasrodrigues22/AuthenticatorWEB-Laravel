<?php

namespace App\Exports;

use App\Models\TaskModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class TasksExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return TaskModel::all();
        return auth()->user()->tasks()->get();
    }
}
