<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\TaskModel;
use CodeIgniter\HTTP\ResponseInterface;

class Task extends BaseController
{
    protected $session;
    protected $taskModel;
    protected $categoryModel;

    public function __construct()
    {
        helper(['form']);
        $this->session = session();
        $this->taskModel = new TaskModel();
        $this->categoryModel = new CategoryModel();
    }
    public function index()
    {
        $user_id = $this->session->get('id');
        
        $tasks = $this->taskModel->getTasksWithCategory($user_id);

        $data = [
            'title' => 'Manajemen Tugas',
            'not_started' => array_filter($tasks, fn($task) => $task['status'] === 'not_started'),
            'in_progress' => array_filter($tasks, fn($task) => $task['status'] === 'in_progress'),
            'completed' => array_filter($tasks, fn($task) => $task['status'] === 'completed'),
        ];

        return view('task/index', $data);
    }
    public function create()
    {
        $data= [
            'title' => 'Create Task',
            'categories' => $this->categoryModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('task/create/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Title wajib diisi',
                    'min_length' => 'Title harus memiliki minimal 3 karakter'
                ]
            ],
            'description' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Deskripsi wajib diisi',
                    'min_length' => 'Deskripsi harus memiliki minimal 10 karakter'
                ]
            ],
            'category_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori wajib dipilih'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wajib dipilih'
                ]
            ],
            'priority' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prioritas wajib dipilih'
                ]
            ],
            'due_date' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal jatuh tempo wajib diisi',
                    'valid_date' => 'Tanggal tidak valid'
                ]
            ]
        ])) {
            return redirect()->to('/task/create')->withInput();
        }
        
        $user_id = $this->session->get('id');
        $slug = url_title($this->request->getVar('title'), '-', true);
        
        $this->taskModel->save([
            'user_id' => $user_id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'description' => $this->request->getVar('description'),
            'status' => $this->request->getVar('status'),
            'priority' => $this->request->getVar('priority'),
            'due_date' => $this->request->getVar('due_date'),
            'category_id' => $this->request->getVar('category_id'),
        ]);
        session()->setFlashdata('success', 'Data tugas berhasil ditambahkan');
        return redirect()->to('/task');
    }
    public function delete($id){
        $this->taskModel->delete($id);
        session()->setFlashdata('success', 'Data tugas berhasil dihapus');
        return redirect()->to('/task');
    }

    public function detail($slug)
    {
        $task = $this->taskModel->where('slug', $slug)->first();

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Task with slug '$slug' not found.");
        }

        $data = [
            'title' => 'Detail Tugas',
            'task' => $task
        ];

        return view('task/detail', $data);
    }

    public function edit($slug)
    {
        $task = $this->taskModel->where('slug', $slug)->first();

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Task with slug '$slug' not found.");
        }

        $data = [
            'title' => 'Edit Tugas',
            'task' => $task,
            'categories' => $this->categoryModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('task/update/update', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'title' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Title wajib diisi',
                    'min_length' => 'Title harus memiliki minimal 3 karakter'
                ]
            ],
            'description' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Deskripsi wajib diisi',
                    'min_length' => 'Deskripsi harus memiliki minimal 10 karakter'
                ]
            ],
            'category_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori wajib dipilih'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status wajib dipilih'
                ]
            ],
            'priority' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prioritas wajib dipilih'
                ]
            ],
            'due_date' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal jatuh tempo wajib diisi',
                    'valid_date' => 'Tanggal tidak valid'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        
        $slug = url_title($this->request->getVar('title'), '-', true);
        
        $this->taskModel->save([
            'id' =>$id,
            'title' => $this->request->getVar('title'),
            'slug' => $slug,
            'description' => $this->request->getVar('description'),
            'status' => $this->request->getVar('status'),
            'priority' => $this->request->getVar('priority'),
            'due_date' => $this->request->getVar('due_date'),
            'category_id' => $this->request->getVar('category_id'),
        ]);

        session()->setFlashdata('success', 'Task successfully updated');
        return redirect()->to('/task');
    }
}