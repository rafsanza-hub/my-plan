<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        
        $data = [
            'title' => 'Category',
            'categories' => $this->categoryModel->getCategories()
        ];
        return view('categories/index', $data);
    }


    public function save()
    {

        
        $this->categoryModel->save([
            'user_id' => user_id(),
            'name' => $this->request->getPost('category'),
        ]);

        return redirect()->to('/category');
    }


    public function delete($id)
    {

        session()->setFlashdata('message', 'dihapus');
        $this->categoryModel->where('user_id', user_id())->delete($id);

        return redirect()->to('/category');
    }


    // public function update($id)
    // {
    //     $this->categoryModel->save([
    //         'id' => $id,
    //         'name' => $this->request->getPost('category')
    //     ]);

    //     return redirect()->to('/categories');
    // }


    public function update($id)
{
    if ($this->request->isAJAX()) {
        $data = [
            'id' => $id,
            'user_id' => user_id(),
            'name' => $this->request->getPost('category')
        ];

        $this->categoryModel->where('user_id', user_id())->save($data);

        return $this->response->setJSON([
            'status' => true,
            'message' => 'Kategori berhasil diupdate'
        ]);
    }
}
}
