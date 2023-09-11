<?php

namespace App\Controllers;

use App\Models\ContactModel;

class ContactController extends BaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = model(ContactModel::class);
    }

    public function index(): string
    {
        $contact = $this->contactModel->get();

        $data = [
            'title' => 'Footer',
            'contact' => $contact->getResult(),
        ];
        return view('admin/footers/contact/contact', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Footer',
        ];
        return view('admin/footers/contact/create', $data);
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
            'icon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Icon tidak boleh kosong!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('contact/create')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'icon'  => $this->request->getVar('icon'),
        ];

        $this->contactModel->insert($data);

        return redirect()->to('contact')->with('message', 'Contact berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->contactModel->where('id', $id);
        $query = $this->contactModel->get();
        $ct = $query->getRow();
        $data = [
            'title' => 'Footer',
            'ct' => $ct,
        ];
        return view('admin/footers/contact/edit', $data);
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
            'icon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Icon tidak boleh kosong!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('contact/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'icon'  => $this->request->getVar('icon'),
        ];

        $this->contactModel->set($data);
        $this->contactModel->where('id', $id);
        $this->contactModel->update();

        return redirect()->to('contact')->with('message', 'Contact berhasil diubah!');
    }

    public function delete($id)
    {

        $this->contactModel->where('id', $id);
        $this->contactModel->delete();

        return redirect()->to('contact')->with('message', 'Contact Berhasil Dihapus!');
    }
}
