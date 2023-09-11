<?php

namespace App\Controllers;

use App\Models\EksternalModel;

class EksternalController extends BaseController
{
    protected $eksternalModel;

    public function __construct()
    {
        $this->eksternalModel = model(EksternalModel::class);
    }

    public function index(): string
    {
        $eksternals = $this->eksternalModel->get();

        $data = [
            'title' => 'Home',
            'eksternals' => $eksternals->getResult(),
        ];
        return view('admin/homes/eksternals/eksternal', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('admin/homes/eksternals/create', $data);
    }

    public function save()
    {

        $rules = [
            'nama_eksternal' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama Akses Eksternal tidak boleh kosong!',
                    'max_length[255]' => 'Nama Akses Eksternal terlalu panjang!'
                ]
            ],
            'link_eksternal' => [
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
            return redirect()->to('eksternal/create')->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil request file image
        $file = $this->request->getFile('image');
        // Generate nama file random
        $fileName = $file->getRandomName();
        // Pindahkan gambar ke direktori
        $file->move('img/eksternals', $fileName);

        $data = [
            'nama_eksternal' => $this->request->getVar('nama_eksternal'),
            'link_eksternal'  => $this->request->getVar('link_eksternal'),
            'image'  => $fileName
        ];

        $this->eksternalModel->insert($data);

        return redirect()->to('eksternal')->with('message', 'Akses Eksternal berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->eksternalModel->where('id', $id);
        $query = $this->eksternalModel->get();
        $eksternal = $query->getRow();
        $data = [
            'title' => 'Home',
            'eksternal' => $eksternal,
        ];
        return view('admin/homes/eksternals/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_eksternal' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama Akses Eksternal tidak boleh kosong!',
                    'max_length[255]' => 'Nama Akses Eksternal terlalu panjang!'
                ]
            ],
            'link_eksternal' => [
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
            return redirect()->to('eksternal/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
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
            $file->move('img/eksternals', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/eksternals/' . $oldImage);
            }
        }

        $data = [
            'nama_eksternal' => $this->request->getVar('nama_eksternal'),
            'link_eksternal'  => $this->request->getVar('link_eksternal'),
            'image'  => $fileName
        ];

        $this->eksternalModel->set($data);
        $this->eksternalModel->where('id', $id);
        $this->eksternalModel->update();

        return redirect()->to('eksternal')->with('message', 'Akses Eksternal berhasil diubah!');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $eksternal = $this->eksternalModel->find($id);

        // Cek jika gambarnya default.jpg
        if ($eksternal['image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/eksternals/' . $eksternal['image']);
        }

        $this->eksternalModel->where('id', $id);
        $this->eksternalModel->delete();

        return redirect()->to('eksternal')->with('message', 'Akses Eksternal Berhasil Dihapus!');
    }
}
