<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskAndUserSeeder extends Seeder
{
    public function run()
    {
        $today     = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $tomorrow  = date('Y-m-d', strtotime('+1 day'));
        $now       = date('Y-m-d H:i:s');

        // 1 Demo User Record
        $this->db->table('users')->insert([
            'username'   => 'art_panulde',
            'full_name'  => 'Art Panulde',
            'email'      => 'art.panulde@example.com',
            'created_at' => $now,
        ]);

        // 8 Task Records Spanning 3 Dates
        $tasks = [
            ['title' => 'Review Operating System Notes', 'status' => 'completed', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Submit Networking Laboratory Report', 'status' => 'pending', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Configure VLAN Trunking Links', 'status' => 'pending', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Update E-Commerce Project Documentation', 'status' => 'pending', 'task_date' => $today, 'created_at' => $now],
            ['title' => 'Finalize System Architecture Design', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $now],
            ['title' => 'Complete Physics Lab Calculations', 'status' => 'pending', 'task_date' => $tomorrow, 'created_at' => $now],
            ['title' => 'Setup Database Schema', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $now],
            ['title' => 'Review Design Thinking Prototype', 'status' => 'completed', 'task_date' => $yesterday, 'created_at' => $now],
        ];

        $this->db->table('tasks')->insertBatch($tasks);
    }
}