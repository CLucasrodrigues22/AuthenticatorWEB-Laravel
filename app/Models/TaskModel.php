<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'task',
        'date_conclusion',
        'user_id',
    ];

    public function user() {
        //belongsTo()
        return $this->belongsTo('App\Models\User');
    }
}
