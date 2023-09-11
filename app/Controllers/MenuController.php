<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\SubmenuModel;

class MenuController extends BaseController
{
    protected $menuModel, $submenuModel;

    public function __construct()
    {
        $this->menuModel = model(MenuModel::class);
        $this->submenuModel = model(SubmenuModel::class);
    }

    public function index(): string
    {
        $menu = $this->menuModel->get();
        $submenu = $this->submenuModel->get();

        $data = [
            'title' => 'Menu',
            'menu' => $menu->getResult(),
            'submenu' => $submenu->getResult(),
        ];
        return view('admin/menu/menu', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Menu',
        ];
        return view('admin/menu/create', $data);
    }

    public function save()
    {

        $rules = [
            'menu' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama menu tidak boleh kosong!',
                    'max_length[255]' => 'Nama menu terlalu panjang!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('menu/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'menu' => $this->request->getVar('menu'),
        ];

        $this->menuModel->insert($data);

        return redirect()->to('menu')->with('message', 'Menu berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->menuModel->where('id', $id);
        $query = $this->menuModel->get();
        $m = $query->getRow();
        $data = [
            'title' => 'Menu',
            'm' => $m,
        ];
        return view('admin/menu/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'menu' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama menu tidak boleh kosong!',
                    'max_length[255]' => 'Nama menu terlalu panjang!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('menu/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'menu' => $this->request->getVar('menu'),
        ];

        $this->menuModel->set($data);
        $this->menuModel->where('id', $id);
        $this->menuModel->update();

        return redirect()->to('menu')->with('message', 'Menu berhasil diubah!');
    }

    public function delete($id)
    {

        $this->submenuModel->where(['menu_id' => $id]);
        $this->submenuModel->delete();


        $this->menuModel->where('id', $id);
        $this->menuModel->delete();

        return redirect()->to('menu')->with('message', 'Menu dan submenu Berhasil Dihapus!');
    }
}
