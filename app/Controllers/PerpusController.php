<?php

namespace App\Controllers;

use App\Models\PerpusModel;

class PerpusController extends BaseController
{
    protected $perpusModel;

    public function __construct()
    {
        $this->perpusModel = model(PerpusModel::class);
    }

    public function index(): string
    {
        $perpus = $this->perpusModel->get();

        $data = [
            'title' => 'Footer',
            'perpus' => $perpus->getResult(),
        ];
        return view('admin/footers/perpus/perpus', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Footer',
        ];
        return view('admin/footers/perpus/create', $data);
    }

    public function save()
    {

        $rules = [
            'judul' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong!',
                    'max_length[255]' => 'Judul terlalu panjang!'
                ]
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link tidak boleh kosong!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('perpus/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'link'  => $this->request->getVar('link'),
        ];

        $this->perpusModel->insert($data);

        return redirect()->to('perpus')->with('message', 'Perpus berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->perpusModel->where('id', $id);
        $query = $this->perpusModel->get();
        $per = $query->getRow();
        $data = [
            'title' => 'Footer',
            'per' => $per,
        ];
        return view('admin/footers/perpus/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong!',
                    'max_length[255]' => 'Judul terlalu panjang!'
                ]
            ],
            'link' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link tidak boleh kosong!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('perpus/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'link'  => $this->request->getVar('link'),
        ];

        $this->perpusModel->set($data);
        $this->perpusModel->where('id', $id);
        $this->perpusModel->update();

        return redirect()->to('perpus')->with('message', 'Perpus berhasil diubah!');
    }

    public function delete($id)
    {

        $this->perpusModel->where('id', $id);
        $this->perpusModel->delete();

        return redirect()->to('perpus')->with('message', 'Perpus Berhasil Dihapus!');
    }
}
