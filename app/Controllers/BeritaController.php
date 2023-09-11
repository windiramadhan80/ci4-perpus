<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class BeritaController extends BaseController
{
    protected $beritaModel;

    public function __construct()
    {
        $this->beritaModel = model(BeritaModel::class);
    }

    public function index(): string
    {
        $berita = $this->beritaModel->get();

        $data = [
            'title' => 'Home',
            'berita' => $berita->getResult(),
        ];
        return view('admin/homes/berita/berita', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('admin/homes/berita/create', $data);
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
            'slug' => [
                'rules' => 'required|max_length[255]|is_unique[berita.slug]',
                'errors' => [
                    'required' => 'Slug tidak boleh kosong!',
                    'max_length[255]' => 'Slug terlalu panjang!',
                    'is_unique[berita.slug]' => 'Slug sudah ada!'
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berita tidak boleh kosong!'
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
            return redirect()->to('berita/create')->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil request file image
        $file = $this->request->getFile('image');
        // Generate nama file random
        $fileName = $file->getRandomName();
        // Pindahkan gambar ke direktori
        $file->move('img/berita', $fileName);

        $data = [
            'judul' => $this->request->getVar('judul'),
            'slug'  => $this->request->getVar('slug'),
            'body'  => $this->request->getVar('body'),
            'image'  => $fileName
        ];

        $this->beritaModel->insert($data);

        return redirect()->to('berita')->with('message', 'Berita berhasil ditambahkan!');
    }

    public function detail($slug)
    {
        $this->beritaModel->where('slug', $slug);
        $berita = $this->beritaModel->get();
        $data = [
            'title' => 'Home',
            'berita' => $berita->getRow(),
        ];
        return view('admin/homes/berita/detail', $data);
    }

    public function edit($id)
    {
        $this->beritaModel->where('id', $id);
        $query = $this->beritaModel->get();
        $berita = $query->getRow();
        $data = [
            'title' => 'Home',
            'berita' => $berita,
        ];
        return view('admin/homes/berita/edit', $data);
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
            'slug' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Slug tidak boleh kosong!',
                    'max_length[255]' => 'Slug terlalu panjang!',
                    'is_unique[berita.slug]' => 'Slug sudah ada!'
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Berita tidak boleh kosong!'
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
        $this->beritaModel->where('id', $id);
        $query = $this->beritaModel->get();
        $berita = $query->getRow();


        if ($this->request->getVar('slug') != $berita->slug) {
            $rules['slug'] = 'is_unique[berita.slug]';
        }

        if (!$this->validate($rules)) {
            return redirect()->to('berita/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
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
            $file->move('img/berita', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/berita/' . $oldImage);
            }
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'slug'  => $this->request->getVar('slug'),
            'body'  => $this->request->getVar('body'),
            'image'  => $fileName
        ];

        $this->beritaModel->set($data);
        $this->beritaModel->where('id', $id);
        $this->beritaModel->update();

        return redirect()->to('berita')->with('message', 'Berita berhasil diubah!');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $berita = $this->beritaModel->find($id);

        // Cek jika gambarnya default.jpg
        if ($berita['image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/berita/' . $berita['image']);
        }

        $this->beritaModel->where('id', $id);
        $this->beritaModel->delete();

        return redirect()->to('berita')->with('message', 'Berita Berhasil Dihapus!');
    }
}
