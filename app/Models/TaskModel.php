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
        'created_at',
        'is_archived'
    ];

    // Retrieve only today's active tasks
    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->where('is_archived', 0)
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }

    // Retrieve all active tasks ordered by date
    public function getAllTasks()
    {
        return $this->where('is_archived', 0)
                    ->orderBy('task_date', 'ASC')
                    ->orderBy('id', 'ASC')
                    ->findAll();
    }
}
