<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'title',
        'status',
        'task_date',
        'created_at'
    ];

    // Retrieve only today's tasks
    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }

    // Retrieve all tasks, ordered by date
    public function getAllTasks()
    {
        return $this->orderBy('task_date', 'ASC')
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }
}
