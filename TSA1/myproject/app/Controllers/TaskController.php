<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please log in to access tasks.');
        }

        $taskModel = new TaskModel();
        
        // Fetch all tasks ordered by task_date
        $data['tasks'] = $taskModel->orderBy('task_date', 'ASC')->findAll();

        return view('tasks/index', $data);
    }

    public function profile()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Please log in to view your profile.');
        }

        $userModel = new UserModel();
        $userId = session()->get('id');
        $data['user'] = $userModel->find($userId);

        return view('profile', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function store()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $taskModel = new TaskModel();

        $taskModel->save([
            'title'     => $this->request->getPost('title'),
            'status'    => '0', // Default to pending
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task added successfully.');
    }

    public function delete(int $id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $taskModel = new TaskModel();
        $taskModel->delete($id);

        return redirect()->to('/tasks')->with('success', 'Task deleted successfully.');
    }
}