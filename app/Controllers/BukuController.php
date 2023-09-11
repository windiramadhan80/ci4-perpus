<?php

namespace App\Controllers;

use App\Models\BukuModel;

class BukuController extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = model(BukuModel::class);
    }

    public function index(): string
    {
        $buku = $this->bukuModel->get();

        $data = [
            'title' => 'Home',
            'buku' => $buku->getResult(),
        ];
        return view('admin/homes/buku/buku', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('admin/homes/buku/create', $data);
    }

    public function save()
    {

        $rules = [
            'nama_buku' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama ebook tidak boleh kosong!',
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
                ]
            ],
            'facebook' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
                ]
            ],
            'twitter' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
                ]
            ],
            'instagram' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
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
            return redirect()->to('buku-terbaru/create')->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil request file image
        $file = $this->request->getFile('image');
        // Generate nama file random
        $fileName = $file->getRandomName();
        // Pindahkan gambar ke direktori
        $file->move('img/buku', $fileName);

        $data = [
            'nama_buku' => $this->request->getVar('nama_buku'),
            'facebook'  => $this->request->getVar('facebook'),
            'twitter'  => $this->request->getVar('twitter'),
            'instagram'  => $this->request->getVar('facebook'),
            'image'  => $fileName
        ];

        $this->bukuModel->insert($data);

        return redirect()->to('buku-terbaru')->with('message', 'Buku Terbaru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->bukuModel->where('id', $id);
        $query = $this->bukuModel->get();
        $buku = $query->getRow();
        $data = [
            'title' => 'Home',
            'buku' => $buku,
        ];
        return view('admin/homes/buku/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_buku' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama ebook tidak boleh kosong!',
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
                ]
            ],
            'facebook' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
                ]
            ],
            'twitter' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
                ]
            ],
            'instagram' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
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
            return redirect()->to('buku-terbaru/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
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
            $file->move('img/buku', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/buku/' . $oldImage);
            }
        }

        $data = [
            'nama_buku' => $this->request->getVar('nama_buku'),
            'facebook'  => $this->request->getVar('facebook'),
            'twitter'  => $this->request->getVar('twitter'),
            'instagram'  => $this->request->getVar('facebook'),
            'image'  => $fileName
        ];

        $this->bukuModel->set($data);
        $this->bukuModel->where('id', $id);
        $this->bukuModel->update();

        return redirect()->to('buku-terbaru')->with('message', 'Buku Terbaru berhasil diubah!');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $buku = $this->bukuModel->find($id);

        // Cek jika gambarnya default.jpg
        if ($buku['image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/buku/' . $buku['image']);
        }

        $this->bukuModel->where('id', $id);
        $this->bukuModel->delete();

        return redirect()->to('buku-terbaru')->with('message', 'Buku Terbaru Berhasil Dihapus!');
    }
}
