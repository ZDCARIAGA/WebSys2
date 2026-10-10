<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    // Welcome page - today's tasks only
    public function index()
    {
        $taskModel = new TaskModel();

        return view('tasks/welcome', [
            'tasks' => $taskModel->getTodayTasks(),
            'today' => date('Y-m-d')
        ]);
    }

    // Task List - all tasks
    public function all()
    {
        $taskModel = new TaskModel();

        return view('tasks/list', [
            'tasks' => $taskModel->getAllTasks()
        ]);
    }

    // Display New Task form
    public function new()
    {
        return view('tasks/new');
    }

    // Save a new task
    public function create()
    {
        $data = [
            'title' => trim((string) $this->request->getPost('title')),
            'status' => (string) $this->request->getPost('status'),
            'task_date' => (string) $this->request->getPost('task_date')
        ];

        $rules = [
            'title' => 'required|max_length[150]',
            'status' => 'required|in_list[pending,completed]',
            'task_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validateData($data, $rules)) {
            return redirect()->to(site_url('tasks/new'))
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data['created_at'] = date('Y-m-d H:i:s');

        $taskModel = new TaskModel();
        $taskModel->insert($data);

        return redirect()->to(site_url('tasks'))
            ->with('message', 'Task created successfully.');
    }


// Display Edit Task form
public function edit(int $id)
{
    $taskModel = new TaskModel();
    $task = $taskModel
        ->where('is_archived', 0)
        ->find($id);

    if (!$task) {
        return redirect()->to(site_url('tasks'))
            ->with('error', 'Task not found.');
    }

    return view('tasks/edit', [
        'task' => $task
    ]);
}

// Update an existing task
public function update(int $id)
{
    $taskModel = new TaskModel();
    $task = $taskModel
        ->where('is_archived', 0)
        ->find($id);

    if (!$task) {
        return redirect()->to(site_url('tasks'))
            ->with('error', 'Task not found.');
    }

    $data = [
        'title' => trim((string) $this->request->getPost('title')),
        'status' => (string) $this->request->getPost('status'),
        'task_date' => (string) $this->request->getPost('task_date')
    ];

    $rules = [
        'title' => 'required|max_length[150]',
        'status' => 'required|in_list[pending,completed]',
        'task_date' => 'required|valid_date[Y-m-d]'
    ];

    if (!$this->validateData($data, $rules)) {
        return redirect()->to(site_url("tasks/{$id}/edit"))
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    if (!$taskModel->update($id, $data)) {
        return redirect()->back()
            ->withInput()
            ->with('errors', [
                'task' => 'Unable to update the task.'
            ]);
    }

    return redirect()->to(site_url('tasks'))
        ->with('message', 'Task updated successfully.');
}


// Archive a task instead of permanently deleting it
public function archive(int $id)
{
    $taskModel = new TaskModel();

    // Find the task only if it is not already archived
    $task = $taskModel
        ->where('is_archived', 0)
        ->find($id);

    if (!$task) {
        return redirect()->to(site_url('tasks'))
            ->with('error', 'Task not found or already archived.');
    }

    // Soft deletion using the is_archived flag
    if (!$taskModel->update($id, ['is_archived' => 1])) {
        return redirect()->to(site_url('tasks'))
            ->with('error', 'Unable to archive the task.');
    }

    return redirect()->to(site_url('tasks'))
        ->with('message', 'Task archived successfully.');
}


}
