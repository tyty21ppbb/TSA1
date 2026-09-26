<?php

namespace App\Controllers;

use App\Models\TaskModel;

class TaskController extends BaseController
{
   public function index()
{
    $model = new TaskModel();
    $data['tasks'] = $model->findAll(); 
    
    return view('templates/header', $data) 
         . view('tasks', $data) 
         . view('templates/footer');
}

public function allTasks()
{
    $model = new TaskModel();
    $data['tasks'] = $model->findAll();

    return view('templates/header', $data) 
         . view('tasks', $data) 
         . view('templates/footer');
}
    public function add()
    {
        $model = new TaskModel();
        
        $validation = \Config\Services::validation();
        $validation->setRules([
            'title'     => 'required|min_length[3]',
            'task_date' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $model->save([
            'title'     => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
            'status'    => 0 // Default incomplete status
        ]);

        return redirect()->to('/tasks')->with('message', 'Task successfully added.');
    }

    public function toggleStatus($id = null)
    {
        $model = new TaskModel();
        $task = $model->find($id);

        if ($task) {
            // Toggle status between 0 and 1 (or active/completed)
            $newStatus = $task['status'] == 1 ? 0 : 1;
            $model->update($id, ['status' => $newStatus]);
        }

        return redirect()->back();
    }

    public function delete($id = null)
    {
        $model = new TaskModel();
        
        // Permanently delete the task from the database
        if ($model->find($id)) {
            $model->delete($id);
        }
        
        return redirect()->to('/tasks')->with('message', 'Task permanently deleted.');
    }

   public function about()
{
    return view('templates/header') 
         . view('about') 
         . view('templates/footer');
}
}