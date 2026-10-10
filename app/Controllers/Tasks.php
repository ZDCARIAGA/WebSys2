<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();

        $data = [
            'tasks' => $taskModel->getTodayTasks(),
            'today' => date('Y-m-d')
        ];

        return view('tasks/welcome', $data);
    }

        public function all()
    {
        $taskModel = new TaskModel();

        return view('tasks/list', [
            'tasks' => $taskModel->getAllTasks()
        ]);
    }
}
