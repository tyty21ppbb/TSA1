<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    // Profile Page (/profile) - Displays single demo user
    public function profile()
    {
        $userModel = new UserModel();

        $data = [
            'user'        => $userModel->getDemoUser(),
            'currentPage' => 'profile',
        ];

        return view('templates/header', $data)
            . view('profile', $data)
            . view('templates/footer');
    }
}