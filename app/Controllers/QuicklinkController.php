<?php

namespace App\Controllers;

use App\Models\QuicklinkModel;

class QuicklinkController extends BaseController
{
    protected $quicklinkModel;

    public function __construct()
    {
        $this->quicklinkModel = model(QuicklinkModel::class);
    }

    public function index(): string
    {
        $quicklink = $this->quicklinkModel->get();

        $data = [
            'title' => 'Footer',
            'quicklink' => $quicklink->getResult(),
        ];
        return view('admin/footers/quicklink/quicklink', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Footer',
        ];
        return view('admin/footers/quicklink/create', $data);
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
            return redirect()->to('quicklink/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'link'  => $this->request->getVar('link'),
        ];

        $this->quicklinkModel->insert($data);

        return redirect()->to('quicklink')->with('message', 'Quicklink berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->quicklinkModel->where('id', $id);
        $query = $this->quicklinkModel->get();
        $ql = $query->getRow();
        $data = [
            'title' => 'Footer',
            'ql' => $ql,
        ];
        return view('admin/footers/quicklink/edit', $data);
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
            return redirect()->to('quicklink/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'link'  => $this->request->getVar('link'),
        ];

        $this->quicklinkModel->set($data);
        $this->quicklinkModel->where('id', $id);
        $this->quicklinkModel->update();

        return redirect()->to('quicklink')->with('message', 'Quicklink berhasil diubah!');
    }

    public function delete($id)
    {

        $this->quicklinkModel->where('id', $id);
        $this->quicklinkModel->delete();

        return redirect()->to('quicklink')->with('message', 'Quicklink Berhasil Dihapus!');
    }
}
