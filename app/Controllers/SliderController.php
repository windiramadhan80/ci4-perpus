<?php

namespace App\Controllers;

use App\Models\SliderModel;

class SliderController extends BaseController
{
    protected $sliderModel;

    public function __construct()
    {
        $this->sliderModel = model(SliderModel::class);
    }

    public function index(): string
    {
        $sliders = $this->sliderModel->get();

        $data = [
            'title' => 'Home',
            'sliders' => $sliders->getResult(),
        ];
        return view('admin/homes/sliders/slider', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('admin/homes/sliders/create', $data);
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
            'sub_judul' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Sub Judul tidak boleh kosong!',
                    'max_length[255]' => 'Judul terlalu panjang!'
                ]
            ],
            'link' => [
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
            return redirect()->to('slider/create')->withInput()->with('errors', $this->validator->getErrors());
        }
        // Ambil request file image
        $file = $this->request->getFile('image');
        // Generate nama file random
        $fileName = $file->getRandomName();
        // Pindahkan gambar ke direktori
        $file->move('img/sliders', $fileName);

        $data = [
            'judul' => $this->request->getVar('judul'),
            'sub_judul'  => $this->request->getVar('sub_judul'),
            'link'  => $this->request->getVar('link'),
            'image'  => $fileName
        ];

        $this->sliderModel->insert($data);

        return redirect()->to('slider')->with('message', 'Slider berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sliders = $this->sliderModel->find($id);
        $data = [
            'title' => 'Home',
            'sliders' => $sliders,
        ];
        return view('admin/homes/sliders/edit', $data);
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
            'sub_judul' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Sub Judul tidak boleh kosong!',
                    'max_length[255]' => 'Judul terlalu panjang!'
                ]
            ],
            'link' => [
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
            return redirect()->to('slider/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
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
            $file->move('img/sliders', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/sliders/' . $oldImage);
            }
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'sub_judul'  => $this->request->getVar('sub_judul'),
            'link'  => $this->request->getVar('link'),
            'image'  => $fileName
        ];

        $this->sliderModel->set($data);
        $this->sliderModel->where('id', $id);
        $this->sliderModel->update();

        return redirect()->to('slider')->with('message', 'Slider berhasil diubah!');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $slider = $this->sliderModel->find($id);

        // Cek jika gambarnya default.jpg
        if ($slider['image'] != 'default.jpg') {
            // hapus gambar
            unlink('img/sliders/' . $slider['image']);
        }

        $this->sliderModel->where('id', $id);
        $this->sliderModel->delete();

        return redirect()->to('slider')->with('message', 'Gambar Berhasil Dihapus!');
    }
}
