<?php

namespace App\Controllers;

use App\Models\JurnalModel;

class JurnalController extends BaseController
{
    protected $jurnalModel;

    public function __construct()
    {
        $this->jurnalModel = model(JurnalModel::class);
    }

    public function index(): string
    {
        $jurnals = $this->jurnalModel->get();

        $data = [
            'title' => 'Home',
            'jurnals' => $jurnals->getResult(),
        ];
        return view('admin/homes/jurnals/jurnal', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('admin/homes/jurnals/create', $data);
    }

    public function save()
    {

        $rules = [
            'nama_jurnal' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong!',
                    'max_length[255]' => 'Judul terlalu panjang!'
                ]
            ],
            'link_jurnal' => [
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
            return redirect()->to('jurnal-langgan/create')->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil request file image
        $file = $this->request->getFile('image');
        // Generate nama file random
        $fileName = $file->getRandomName();
        // Pindahkan gambar ke direktori
        $file->move('img/jurnals', $fileName);

        $data = [
            'nama_jurnal' => $this->request->getVar('nama_jurnal'),
            'link_jurnal'  => $this->request->getVar('link_jurnal'),
            'image'  => $fileName
        ];

        $this->jurnalModel->insert($data);

        return redirect()->to('jurnal-langgan')->with('message', 'Jurnal berhasil ditambahkan!');
    }
 
    public function edit($id)
    {
        $this->jurnalModel->where('id', $id);
        $query = $this->jurnalModel->get();
        $jurnal = $query->getRow();
        $data = [
            'title' => 'Home',
            'jurnal' => $jurnal,
        ];
        return view('admin/homes/jurnals/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_jurnal' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Judul tidak boleh kosong!',
                    'max_length[255]' => 'Judul terlalu panjang!'
                ]
            ],
            'link_jurnal' => [
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
            return redirect()->to('jurnal-langgan/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
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
            $file->move('img/jurnals', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/jurnals/' . $oldImage);
            }
        }

        $data = [
            'nama_jurnal' => $this->request->getVar('nama_jurnal'),
            'link_jurnal'  => $this->request->getVar('link_jurnal'),
            'image'  => $fileName
        ];

        $this->jurnalModel->set($data);
        $this->jurnalModel->where('id', $id);
        $this->jurnalModel->update();

        return redirect()->to('jurnal-langgan')->with('message', 'Jurnal berhasil diubah!');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $jurnal = $this->jurnalModel->find($id);

        // Cek jika gambarnya default.jpg
        if ($jurnal['image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/jurnals/' . $jurnal['image']);
        }

        $this->jurnalModel->where('id', $id);
        $this->jurnalModel->delete();

        return redirect()->to('jurnal-langgan')->with('message', 'Jurnal Berhasil Dihapus!');
    }
   
}
