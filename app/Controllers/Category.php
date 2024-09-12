<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use CodeIgniter\HTTP\ResponseInterface;

class Category extends BaseController
{
    protected $session;
    protected $categoryModel;
    public function __construct()
    {
        helper(['form']);
        $this->session = session();
        $this->categoryModel = new CategoryModel();
    }
    public function index()
    {
        $user_id = $this->session->get('id');  
        $data = [
            'title' => 'Manajemen Kategori',
            'categories' => $this->categoryModel->getCategoryUsers($user_id)  // Fetch categories only for this user
        ];
        return view('category/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Create Category',
            'validation' => \Config\Services::validation()
        ];
        return view('category/create/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'name' => [
                'rules' =>'required|is_unique[categories.name]',
                'errors' => [
                   'required' => '{field} wajib diisi',
                    'is_unique' => '{field} sudah ada'
                ]
            ]
        ])) {
            return redirect()->to('/category/create')->withInput();
        }
        $user_id = $this->session->get('id');
        $data = [
            'user_id' => $user_id,
            'name' => $this->request->getVar('name')
        ];
        $this->categoryModel->save($data);
        session()->setFlashdata('success', 'Data kategori berhasil ditambahkan');
        return redirect()->to('/category');
    }
    public function delete($id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            session()->setFlashdata('error', 'Kategori tidak ditemukan.');
            return redirect()->to('/category');
        }
    
        $this->categoryModel->delete($id);
        session()->setFlashdata('success', 'Kategori berhasil dihapus.');
        return redirect()->to('/category');
    }
}