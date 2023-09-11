<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\SubmenuModel;

class SubmenuController extends BaseController
{
    protected $menuModel, $submenuModel;

    public function __construct()
    {
        $this->menuModel = model(MenuModel::class);
        $this->submenuModel = model(SubmenuModel::class);
    }

    public function index()
    {
        return redirect()->to('/');
    }

    public function create()
    {
        $builder = $this->menuModel->get();
        $query = $builder->getResult();

        $data = [
            'title' => 'Menu',
            'menu' => $query,
        ];
        return view('admin/submenu/create', $data);
    }

    public function save()
    {

        $rules = [
            'menu_id' => [
                'rules' => 'required|integer|max_length[11]',
                'errors' => [
                    'required' => 'Nama menu tidak boleh kosong!',
                    'integer' => 'Yang anda masukan bukan angka!',
                    'max_length[11]' => 'Menu terlalu panjang!'
                ]
            ],
            'submenu' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama sub menu tidak boleh kosong!',
                    'max_length[255]' => 'Nama sub menu terlalu panjang!'
                ]
            ],
            'slug' => [
                'rules' => 'required|max_length[255]|is_unique[submenu.slug]',
                'errors' => [
                    'required' => 'Slug tidak boleh kosong!',
                    'max_length[255]' => 'Slug terlalu panjang!',
                    'is_unique[submenu.slug]' => 'Slug sudah ada!'
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi sub menu tidak boleh kosong!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('submenu/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'menu_id' => $this->request->getVar('menu_id'),
            'submenu' => $this->request->getVar('submenu'),
            'slug' => $this->request->getVar('slug'),
            'body' => $this->request->getVar('body'),
        ];

        $this->submenuModel->insert($data);

        return redirect()->to('menu')->with('message', 'Sub Menu berhasil ditambahkan!');
    }

    public function detail($id)
    {
        $this->submenuModel->where('id', $id);
        $query = $this->submenuModel->get();
        $sm = $query->getRow();
        $data = [
            'title' => 'Menu',
            'sm' => $sm,
        ];
        return view('admin/submenu/detail', $data);
    }

    public function edit($id)
    {
        $menu = $this->menuModel->get()->getResult();

        $this->submenuModel->where('id', $id);
        $query = $this->submenuModel->get();
        $sm = $query->getRow();
        $data = [
            'title' => 'Menu',
            'menu' => $menu,
            'sm' => $sm,
        ];
        return view('admin/submenu/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'menu_id' => [
                'rules' => 'required|integer|max_length[11]',
                'errors' => [
                    'required' => 'Nama menu tidak boleh kosong!',
                    'integer' => 'Yang anda masukan bukan angka!',
                    'max_length[11]' => 'Menu terlalu panjang!'
                ]
            ],
            'submenu' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama sub menu tidak boleh kosong!',
                    'max_length[255]' => 'Nama sub menu terlalu panjang!'
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
                    'required' => 'Isi sub menu tidak boleh kosong!'
                ]
            ],
        ];

        $submenu = $this->submenuModel->find($id);
        $slug = $this->request->getVar('slug');
        if ($submenu['slug'] != $slug) {
            $rules['slug'] = 'is_unique[submenu.slug]';
        }

        if (!$this->validate($rules)) {
            return redirect()->to('submenu/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'menu_id' => $this->request->getVar('menu_id'),
            'submenu' => $this->request->getVar('submenu'),
            'slug' => $this->request->getVar('slug'),
            'body' => $this->request->getVar('body'),
        ];

        $this->submenuModel->set($data);
        $this->submenuModel->where('id', $id);
        $this->submenuModel->update();

        return redirect()->to('menu')->with('message', 'Sub Menu berhasil diubah!');
    }

    public function delete($id)
    {

        $this->submenuModel->where('id', $id);
        $this->submenuModel->delete();

        return redirect()->to('menu')->with('message', 'Sub Menu Berhasil Dihapus!');
    }
}
