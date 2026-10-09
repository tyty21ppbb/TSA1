<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        // If already logged in, redirect to tasks
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/tasks');
        }
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $userModel = new UserModel();

        $loginInput = trim($this->request->getVar('username'));
        $password = $this->request->getVar('password');

        // Look up by username or email (with whitespace trimmed)
        $user = $userModel->where('username', $loginInput)
                          ->orWhere('email', $loginInput)
                          ->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id'        => $user['id'],
                    'username'  => $user['username'],
                    'full_name' => $user['full_name'],
                    'email'     => $user['email'],
                    'isLoggedIn'=> true,
                ];
                $session->set($sessionData);
                return redirect()->to('/tasks')->with('success', 'Welcome back, ' . $user['full_name'] . '!');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Invalid username/email or password.');
    }

    public function register()
    {
        // If already logged in, redirect to tasks
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/tasks');
        }
        return view('auth/register');
    }

    public function storeRegister()
    {
        $userModel = new UserModel();

        $rules = [
            'username' => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel->save([
            'username'  => $this->request->getVar('username'),
            'full_name' => $this->request->getVar('full_name'),
            'email'     => $this->request->getVar('email'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful! Please login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Logged out successfully.');
    }
}