<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
    protected TaskModel $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    // Today's Tasks (Home Page)
    public function index()
    {
        $today = date('Y-m-d');
        $data['tasks'] = $this->taskModel->where('task_date', $today)->findAll();
        $data['title'] = "Today's Tasks";

        return view('templates/header', $data)
             . view('welcome', $data)
             . view('templates/footer');
    }

    // All Tasks Page
    public function allTasks()
    {
        $data['tasks'] = $this->taskModel->orderBy('task_date', 'DESC')->findAll();
        $data['title'] = "All Tasks";

        return view('templates/header', $data)
             . view('tasks', $data)
             . view('templates/footer');
    }

    // Add New Task Action
    public function add()
    {
        $title = $this->request->getPost('title');
        
        if (!empty($title)) {
            $this->taskModel->save([
                'title'     => $title,
                'status'    => 'pending',
                'task_date' => date('Y-m-d')
            ]);
        }

        return redirect()->to('/');
    }

    // Toggle Task Status (pending <-> completed)
    public function toggleStatus(int|string $id)
    {
        $task = $this->taskModel->find($id);

        if ($task) {
            $newStatus = ($task['status'] === 'completed') ? 'pending' : 'completed';
            $this->taskModel->update($id, ['status' => $newStatus]);
        }

        return redirect()->back();
    }

    // About Page
    public function about()
    {
        $data['title'] = "About Project";

        return view('templates/header', $data)
             . view('about', $data)
             . view('templates/footer');
    }
}