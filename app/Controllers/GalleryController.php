<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class GalleryController extends BaseController
{
    protected $galleryModel;

    public function __construct()
    {
        $this->galleryModel = model(GalleryModel::class);
    }

    public function index(): string
    {
        $galleries = $this->galleryModel->get();

        $data = [
            'title' => 'Gallery',
            'galleries' => $galleries->getResult(),
        ];
        return view('admin/galleries/gallery', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Gallery',
        ];
        return view('admin/galleries/create', $data);
    }

    public function save()
    {

        $rules = [
            'nama_gallery' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama gallery tidak boleh kosong!',
                    'max_length[255]' => 'Nama gallery terlalu panjang!'
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
            return redirect()->to('gallery/create')->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil request file image
        $file = $this->request->getFile('image');
        // Generate nama file random
        $fileName = $file->getRandomName();
        // Pindahkan gambar ke direktori
        $file->move('img/galleries', $fileName);

        $data = [
            'nama_gallery' => $this->request->getVar('nama_gallery'),
            'image'  => $fileName
        ];

        $this->galleryModel->insert($data);

        return redirect()->to('gallery')->with('message', 'Gallery berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->galleryModel->where('id', $id);
        $query = $this->galleryModel->get();
        $gallery = $query->getRow();
        $data = [
            'title' => 'Home',
            'gallery' => $gallery,
        ];
        return view('admin/galleries/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_gallery' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama gallery tidak boleh kosong!',
                    'max_length[255]' => 'Nama gallery terlalu panjang!'
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
            return redirect()->to('gallery/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
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
            $file->move('img/galleries', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/galleries/' . $oldImage);
            }
        }

        $data = [
            'nama_gallery' => $this->request->getVar('nama_gallery'),
            'image'  => $fileName
        ];

        $this->galleryModel->set($data);
        $this->galleryModel->where('id', $id);
        $this->galleryModel->update();

        return redirect()->to('gallery')->with('message', 'Gallery berhasil diubah!');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $gallery = $this->galleryModel->find($id);

        // Cek jika gambarnya default.jpg
        if ($gallery['image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/galleries/' . $gallery['image']);
        }

        $this->galleryModel->where('id', $id);
        $this->galleryModel->delete();

        return redirect()->to('gallery')->with('message', 'Gallery Berhasil Dihapus!');
    }
}
