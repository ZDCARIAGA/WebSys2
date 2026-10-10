<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Redirect already logged-in users
        if (session()->get('user_id')) {
            return redirect()->to(site_url('tasks'));
        }

        return view('auth/login');
    }

    public function attempt()
    {
        $username = trim((string) $this->request->getPost('username'));
        $password = (string) $this->request->getPost('password');

        // Basic validation
        if ($username === '' || $password === '') {
            return redirect()->to(site_url('login'))
                ->withInput()
                ->with('error', 'Please enter your username and password.');
        }

        // Find user in database
        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $username)
            ->first();

        // Verify hashed password
        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->to(site_url('login'))
                ->with('error', 'Incorrect username or password.');
        }

        // Prevent session fixation
        $session = session();
        $session->regenerate(true);

        // Store authenticated user details
        $session->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'full_name' => $user['full_name'],
        ]);

        return redirect()->to(site_url('tasks'))
            ->with('message', 'Logged in successfully.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'));
    }
}
