<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
        helper(['url', 'form']);
    }

    public function index()
    {
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        
        $data = [
            'title' => 'Login Page',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function loginAction()
    {
        $rules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Please provide a valid email address.',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must be at least 8 characters long.',
                ],
            ],
        ];
    
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }
    
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('email', $email)->first();
        
        if (!$user) {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }
        
        if (password_verify($password, $user['password'])) {
            $this->setUserSession($user);
            return redirect()->to('/')->with('success', 'Login successful.');
        }
    
        return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
    }

    public function setUserSession($user)
    {
        $data = [
            'id'        => $user['id'],
            'name'      => $user['name'],
            'email'     => $user['email'],
            'isLoggedIn'=> true,
        ];
        
        $this->session->set($data);
        return true;
    }

    public function register()
    {
        $data = [
            'title' => 'Register Page',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function registerAction()
    {
        $rules = [
            'name' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Name is required.',
                    'min_length' => 'Name must be at least 3 characters long.',
                    'max_length' => 'Name must not exceed 50 characters.',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Please provide a valid email address.',
                    'is_unique' => 'This email is already registered.',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must be at least 8 characters long.',
                ],
            ],
        ];
    
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator->getErrors());
        }
    
        $this->userModel->save([
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);
    
        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login')->with('success', 'You are now logged out');
    }
}