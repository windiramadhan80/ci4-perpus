<?php

namespace App\Controllers;

use App\Models\EbookModel;

class EbookController extends BaseController
{
    protected $ebookModel;

    public function __construct()
    {
        $this->ebookModel = model(EbookModel::class);
    }

    public function index(): string
    {
        $ebooks = $this->ebookModel->get();

        $data = [
            'title' => 'Home',
            'ebooks' => $ebooks->getResult(),
        ];
        return view('admin/homes/ebooks/ebook', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('admin/homes/ebooks/create', $data);
    }

    public function save()
    {

        $rules = [
            'nama_ebook' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama ebook tidak boleh kosong!',
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
                ]
            ],
            'link_ebook' => [
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
            return redirect()->to('ebooks/create')->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil request file image
        $file = $this->request->getFile('image');
        // Generate nama file random
        $fileName = $file->getRandomName();
        // Pindahkan gambar ke direktori
        $file->move('img/ebooks', $fileName);

        $data = [
            'nama_ebook' => $this->request->getVar('nama_ebook'),
            'link_ebook'  => $this->request->getVar('link_ebook'),
            'image'  => $fileName
        ];

        $this->ebookModel->insert($data);

        return redirect()->to('ebooks')->with('message', 'Ebook berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->ebookModel->where('id', $id);
        $query = $this->ebookModel->get();
        $ebook = $query->getRow();
        $data = [
            'title' => 'Home',
            'ebook' => $ebook,
        ];
        return view('admin/homes/ebooks/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_ebook' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama ebook tidak boleh kosong!',
                    'max_length[255]' => 'Nama ebook terlalu panjang!'
                ]
            ],
            'link_ebook' => [
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
            return redirect()->to('ebooks/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
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
            $file->move('img/ebooks', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/ebooks/' . $oldImage);
            }
        }

        $data = [
            'nama_ebook' => $this->request->getVar('nama_ebook'),
            'link_ebook'  => $this->request->getVar('link_ebook'),
            'image'  => $fileName
        ];

        $this->ebookModel->set($data);
        $this->ebookModel->where('id', $id);
        $this->ebookModel->update();

        return redirect()->to('ebooks')->with('message', 'Ebook berhasil diubah!');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $ebook = $this->ebookModel->find($id);

        // Cek jika gambarnya default.jpg
        if ($ebook['image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/ebooks/' . $ebook['image']);
        }

        $this->ebookModel->where('id', $id);
        $this->ebookModel->delete();

        return redirect()->to('ebooks')->with('message', 'Ebook Berhasil Dihapus!');
    }
}
