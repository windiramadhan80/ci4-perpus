<?php

namespace App\Controllers;

use App\Models\RepositoryModel;

class RepositoryController extends BaseController
{
    protected $repositoryModel;

    public function __construct()
    {
        $this->repositoryModel = model(RepositoryModel::class);
    }

    public function index(): string
    {
        $repositories = $this->repositoryModel->get();

        $data = [
            'title' => 'Repositori',
            'repositories' => $repositories->getResult(),
        ];
        return view('admin/repositories/repository', $data);
    }

    public function edit($id)
    {
        $this->repositoryModel->where('id', $id);
        $query = $this->repositoryModel->get();
        $r = $query->getRow();
        $data = [
            'title' => 'Repository',
            'r' => $r,
        ];
        return view('admin/repositories/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'link_repository' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link tidak boleh kosong!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('repositori/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'link_repository'  => $this->request->getVar('link_repository'),
        ];

        $this->repositoryModel->set($data);
        $this->repositoryModel->where('id', $id);
        $this->repositoryModel->update();

        return redirect()->to('repositori')->with('message', 'Repository berhasil diubah!');
    }
}
