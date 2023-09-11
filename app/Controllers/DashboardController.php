<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index(): string
    {
        $this->builder->select('users.id as userid, users.name as fullname, image, email, username, description');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', user()->id);
        $query = $this->builder->get();
        $data = [
            'title' => 'Dashboard',
            'users' => $query->getRow()
        ];
        return view('admin/dashboard', $data);
    }
}
