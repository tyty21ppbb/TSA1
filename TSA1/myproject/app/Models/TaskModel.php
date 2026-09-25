<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'status', 'task_date', 'created_at'];

    // Get tasks scheduled for today
    public function getTodayTasks()
    {
        return $this->where('task_date', date('Y-m-d'))
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    // Get all tasks ordered by date
    public function getAllTasks()
    {
        return $this->orderBy('task_date', 'ASC')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}