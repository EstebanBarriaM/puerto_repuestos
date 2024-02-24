<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function index()
    {
        $users = new UsersModel();
        $datos = [
            'users' => $users->getUsers()
        ];
        return view('admin/users/index', $datos);
    }
    public function create()
    {
        return view('admin/users/create');
    }

    public function save()
    {
        $validation = $this->validate([
            'name' => 'required|alpha_space',
            'surname' => 'required|alpha_space',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|matches[c-password]'
        ]);
        if (! $validation) {
            return redirect()->back()->withInput()->with('msg', [
                'body' => 'Tienes campos incorrectos'
            ])
            ->with('errors', $this->validator->getErrors());
        }
        $password = password_hash($this->request->getVar('password'),PASSWORD_DEFAULT);
        $users = new UsersModel();
        $datos = [
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
            'password' => $password
        ];
        $users->insert($datos);
        return redirect()->route('usersList')->with('message', 'Registro creado exitosamente!');
    }
    
    public function edit($id)
    {
        $users = new UsersModel();
        $datos['users'] = $users->where('id',$id)->first();
        return view('admin/users/edit', $datos);
    }
}
