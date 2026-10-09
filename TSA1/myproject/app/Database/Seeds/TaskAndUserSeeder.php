<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskAndUserSeeder extends Seeder
{
    public function run()
    {
        // Insert sample users
        $userModel = new \App\Models\UserModel();
        $userModel->skipValidation(true)->save([
            'id'        => 1,
            'username'  => 'art_panulde',
            'full_name' => 'Art Panulde',
            'email'     => 'art.panulde@example.com',
            'password'  => password_hash('password123', PASSWORD_DEFAULT),
        ]);

        // Insert sample tasks
        $taskModel = new \App\Models\TaskModel();
        $tasks = [
            ['title' => 'Gym', 'status' => '1', 'task_date' => '2026-09-27'],
            ['title' => 'Trip to Vietnam', 'status' => '0', 'task_date' => '2026-09-30'],
            ['title' => 'Trip to Thailand', 'status' => '0', 'task_date' => '2026-09-26'],
            ['title' => 'Hellmerry Concert', 'status' => '0', 'task_date' => '2026-11-28'],
            ['title' => 'Car Show in Marikina', 'status' => '0', 'task_date' => '2026-10-04'],
            ['title' => 'Cisco (CCST) Certification', 'status' => '0', 'task_date' => '2026-10-07'],
            ['title' => 'Cleaning the House', 'status' => '0', 'task_date' => '2026-09-27'],
            ['title' => 'Interview the client in capstone', 'status' => '0', 'task_date' => '2026-10-02'],
        ];

        foreach ($tasks as $task) {
            $taskModel->skipValidation(true)->save($task);
        }
    }
}