<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class UserController extends BaseController
{
    protected $db, $builder, $builderRole;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->builderRole = $this->db->table('auth_groups_users');
    }

    public function index(): string
    {
        $this->builder->select('users.id as userid, users.name as fullname, image, email, username, description');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();
        $data = [
            'title' => 'User Management',
            'users' => $query->getResult(),
        ];
        return view('admin/users/user', $data);
    }

    public function detail($id)
    {
        $this->builder->select('users.id as userid, users.name as fullname, image, email, username, description, users.updated_at as update');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data = [
            'title' => 'User Management',
            'user' => $query->getRow(),
        ];
        return view('admin/users/detail', $data);
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $users = model(UserModel::class)->find($id);

        // Cek jika gambarnya default.jpg
        if ($users->image != 'default.jpg') {
            // hapus gambar
            unlink('img/users/' . $users->image);
        }


        $this->builder->select('users.id as userid, users.name as fullname, image, email, username, description, users.updated_at as update');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');



        $this->builder->where('users.id', $id);
        $this->builder->delete();

        return redirect()->to('users')->with('message', 'Akun Berhasil Dihapus!');
    }

    public function edit($id)
    {
        $this->builder->select('users.id as userid, users.name as fullname, image, email, username, users.updated_at as update, group_id, description');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data = [
            'title' => 'User Management',
            'user' => $query->getRow(),
        ];
        return view('admin/users/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!',
                    'valid_email' => 'Email tidak valid!'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[3]|max_length[30]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong!',
                    'min_length[3]' => 'Username minimal 3 huruf!',
                    'max_length[30]' => 'Username maksimal 30 huruf!'
                ]
            ],
            'image' => [
                'rules' => 'max_size[image,1024]|mime_in[image,image/png,image/jpeg]',
                'errors' => [
                    'max_size[image,1024]' => 'Ukuran maksimal 1 MB',
                    'mime_in[image,image/png,image/jpeg]' => 'Yang anda upload bukan gambar'
                ]
            ],
            'group_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Role wajib diisi'
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('users/edit/' . $id)->withInput()->with('errors', $this->validator->getErrors());
        }


        $file = $this->request->getFile('image');
        $oldImage = $this->request->getVar('oldImage');
        if ($file->getError() == 4) {
            $fileName = $oldImage;
        } else {
            $fileName = $file->getRandomName();
            $file->move('img/users', $fileName);
            if ($oldImage != 'default.jpg') {
                unlink('img/users/' . $oldImage);
            }
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'username'  => $this->request->getVar('username'),
            'image'  => $fileName
        ];
        // Update tabel users
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($data);

        // Update tabel auth_groups_users
        $this->builderRole->set('group_id', $this->request->getVar('group_id'));
        $this->builderRole->where('user_id', $id);
        $this->builderRole->update();
        return redirect()->to('users')->with('message', 'Akun Berhasil Diubah!');
    }
}
