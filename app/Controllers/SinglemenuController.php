<?php

namespace App\Controllers;

use App\Models\SinglemenuModel;

class SinglemenuController extends BaseController
{
    protected $singleMenuModel;

    public function __construct()
    {
        $this->singleMenuModel = model(SinglemenuModel::class);
    }

    public function index()
    {
        $builder = $this->singleMenuModel->get();
        $query = $builder->getResult();

        $data = [
            'title' => 'Menu',
            'singleMenu' => $query,
        ];
        return view('admin/singleMenu/single_menu', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Menu',
        ];
        return view('admin/singleMenu/create', $data);
    }

    public function save()
    {

        $rules = [
            'single_menu' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama Single Menu tidak boleh kosong!',
                    'max_length[255]' => 'Nama Single Menu terlalu panjang!'
                ]
            ],
            'slug' => [
                'rules' => 'required|max_length[255]|is_unique[single_menu.slug]',
                'errors' => [
                    'required' => 'Slug tidak boleh kosong!',
                    'max_length[255]' => 'Slug terlalu panjang!',
                    'is_unique[single_menu.slug]' => 'Slug sudah ada!'
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Single Menu tidak boleh kosong!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('single-menu/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'single_menu' => $this->request->getVar('single_menu'),
            'slug' => $this->request->getVar('slug'),
            'body' => $this->request->getVar('body'),
        ];

        $this->singleMenuModel->insert($data);

        return redirect()->to('single-menu')->with('message', 'Single Menu berhasil ditambahkan!');
    }

    public function detail($id)
    {
        $this->singleMenuModel->where('id', $id);
        $query = $this->singleMenuModel->get();
        $smm = $query->getRow();
        $data = [
            'title' => 'Menu',
            'smm' => $smm,
        ];
        return view('admin/singleMenu/detail', $data);
    }

    public function edit($id)
    {
        $this->singleMenuModel->where('id', $id);
        $query = $this->singleMenuModel->get();
        $smm = $query->getRow();
        $data = [
            'title' => 'Menu',
            'smm' => $smm,
        ];
        return view('admin/singleMenu/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'single_menu' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama Single Menu tidak boleh kosong!',
                    'max_length[255]' => 'Nama Single Menu terlalu panjang!'
                ]
            ],
            'slug' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Slug tidak boleh kosong!',
                    'max_length[255]' => 'Slug terlalu panjang!',
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Single Menu tidak boleh kosong!'
                ]
            ],
        ];

        $singleMenu = $this->singleMenuModel->find($id);
        $slug = $this->request->getVar('slug');
        if ($singleMenu['slug'] != $slug) {
            $rules['slug'] = 'is_unique[single_menu.slug]';
        }

        if (!$this->validate($rules)) {
            return redirect()->to('single-menu/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'single_menu' => $this->request->getVar('single_menu'),
            'slug' => $this->request->getVar('slug'),
            'body' => $this->request->getVar('body'),
        ];

        $this->singleMenuModel->set($data);
        $this->singleMenuModel->where('id', $id);
        $this->singleMenuModel->update();

        return redirect()->to('single-menu')->with('message', 'Single Menu berhasil diubah!');
    }

    public function delete($id)
    {
        $this->singleMenuModel->where('id', $id);
        $this->singleMenuModel->delete();

        return redirect()->to('single-menu')->with('message', 'Single Menu Berhasil Dihapus!');
    }
}
