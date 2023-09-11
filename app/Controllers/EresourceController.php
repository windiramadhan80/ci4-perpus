<?php

namespace App\Controllers;

use App\Models\EresourceModel;

class EresourceController extends BaseController
{
    protected $eresourceModel;

    public function __construct()
    {
        $this->eresourceModel = model(EresourceModel::class);
    }

    public function index(): string
    {
        $eResources = $this->eresourceModel->get();

        $data = [
            'title' => 'Home',
            'eResources' => $eResources->getResult(),
        ];
        return view('admin/homes/eResources/e_resource', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('admin/homes/eResources/create', $data);
    }

    public function save()
    {

        $rules = [
            'nama_eresource' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama E-Resource tidak boleh kosong!',
                    'max_length[255]' => 'Nama E-resource terlalu panjang!'
                ]
            ],
            'link_eresource' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link tidak boleh kosong!'
                ]
            ],
            'image' => [
                'rules' => 'uploaded[image]|max_size[image,1024]|mime_in[image,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Gambar harus diisi!',
                    'max_size[image,1024]' => 'Ukuran maksimal 1 MB!',
                    'mime_in[image,image/png,image/jpeg]' => 'Yang anda upload bukan gambar!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('e-resource/create')->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil request file image
        $file = $this->request->getFile('image');
        // Generate nama file random
        $fileName = $file->getRandomName();
        // Pindahkan gambar ke direktori
        $file->move('img/eResources', $fileName);

        $data = [
            'nama_eresource' => $this->request->getVar('nama_eresource'),
            'link_eresource'  => $this->request->getVar('link_eresource'),
            'image'  => $fileName
        ];

        $this->eresourceModel->insert($data);

        return redirect()->to('e-resource')->with('message', 'E-Resource berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->eresourceModel->where('id', $id);
        $query = $this->eresourceModel->get();
        $er = $query->getRow();
        $data = [
            'title' => 'Home',
            'er' => $er,
        ];
        return view('admin/homes/eResources/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_eresource' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama E-Resource tidak boleh kosong!',
                    'max_length[255]' => 'Nama E-Resource terlalu panjang!'
                ]
            ],
            'link_eresource' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link tidak boleh kosong!'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,1024]|mime_in[image,image/png,image/jpeg]',
                'errors' => [
                    'max_size[image,1024]' => 'Ukuran maksimal 1 MB!',
                    'mime_in[image,image/png,image/jpeg]' => 'Yang anda upload bukan gambar!'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('e-resource/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil file gambar
        $file = $this->request->getFile('image');
        // Ambil ke dalam variable Gambar Lama
        $oldImage = $this->request->getVar('oldImage');

        // Cek jika gambar tidak diubah
        if ($file->getError() == 4) {
            $fileName = $oldImage;
        } else {
            // Jika gambar diubah
            $fileName = $file->getRandomName();
            $file->move('img/eResources', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/eResources/' . $oldImage);
            }
        }

        $data = [
            'nama_eresource' => $this->request->getVar('nama_eresource'),
            'link_eresource'  => $this->request->getVar('link_eresource'),
            'image'  => $fileName
        ];

        $this->eresourceModel->set($data);
        $this->eresourceModel->where('id', $id);
        $this->eresourceModel->update();

        return redirect()->to('e-resource')->with('message', 'E-Resource berhasil diubah!');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $eResource = $this->eresourceModel->find($id);

        // Cek jika gambarnya default.jpg
        if ($eResource['image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/eResources/' . $eResource['image']);
        }

        $this->eresourceModel->where('id', $id);
        $this->eresourceModel->delete();

        return redirect()->to('e-resource')->with('message', 'E-Resource Berhasil Dihapus!');
    }
}
