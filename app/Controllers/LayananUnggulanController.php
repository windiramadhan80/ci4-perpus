<?php

namespace App\Controllers;

use App\Models\LayananUnggulanModel;

class LayananUnggulanController extends BaseController
{
    protected $layananUnggulanModel;

    public function __construct()
    {
        $this->layananUnggulanModel = model(LayananUnggulanModel::class);
    }

    public function index(): string
    {
        $layananUnggulan = $this->layananUnggulanModel->get();

        $data = [
            'title' => 'Home',
            'layananUnggulan' => $layananUnggulan->getResult(),
        ];
        return view('admin/homes/layananUnggulan/layanan_unggulan', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('admin/homes/layananUnggulan/create', $data);
    }

    public function save()
    {

        $rules = [
            'nama_layanan' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong!',
                    'max_length[255]' => 'Judul terlalu panjang!'
                ]
            ],
            'link_layanan' => [
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
            return redirect()->to('layanan-unggulan/create')->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil request file image
        $file = $this->request->getFile('image');
        // Generate nama file random
        $fileName = $file->getRandomName();
        // Pindahkan gambar ke direktori
        $file->move('img/layananUnggulan', $fileName);

        $data = [
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'link_layanan'  => $this->request->getVar('link_layanan'),
            'image'  => $fileName
        ];


        $this->layananUnggulanModel->insert($data);

        return redirect()->to('layanan-unggulan')->with('message', 'Layanan Unggulan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->layananUnggulanModel->where('id', $id);
        $query = $this->layananUnggulanModel->get();
        $layananUnggulan = $query->getRow();
        $data = [
            'title' => 'Home',
            'lu' => $layananUnggulan,
        ];
        return view('admin/homes/layananUnggulan/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_layanan' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong!',
                    'max_length[255]' => 'Judul terlalu panjang!'
                ]
            ],
            'link_layanan' => [
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
            return redirect()->to('layanan-unggulan/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
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
            $file->move('img/layananUnggulan', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/layananUnggulan/' . $oldImage);
            }
        }

        $data = [
            'nama_layanan' => $this->request->getVar('nama_layanan'),
            'link_layanan'  => $this->request->getVar('link_layanan'),
            'image'  => $fileName
        ];

        $this->layananUnggulanModel->set($data);
        $this->layananUnggulanModel->where('id', $id);
        $this->layananUnggulanModel->update();

        return redirect()->to('layanan-unggulan')->with('message', 'Layanan Unggulan berhasil diubah!');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $layananUnggulan = $this->layananUnggulanModel->find($id);

        // Cek jika gambarnya default.jpg
        if ($layananUnggulan['image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/layananUnggulan/' . $layananUnggulan['image']);
        }

        $this->layananUnggulanModel->where('id', $id);
        $this->layananUnggulanModel->delete();

        return redirect()->to('layanan-unggulan')->with('message', 'Layanan Unggulan Berhasil Dihapus!');
    }
}
