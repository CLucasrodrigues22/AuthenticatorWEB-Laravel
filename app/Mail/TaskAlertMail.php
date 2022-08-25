<?php

namespace App\Mail;

use App\Models\TaskModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskAlertMail extends Mailable
{
    use Queueable, SerializesModels;
    public $taskModel;
    public $date_conclusion;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TaskModel $taskModel)
    {
        $this->taskModel = $taskModel->task;
        $this->date_conclusion = date('d/m/y', strtotime($taskModel->date_conclusion));
        $this->url = 'http://localhost:8000/task/'.$taskModel->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.newTask')->subject('A new task was been created');
    }
}
