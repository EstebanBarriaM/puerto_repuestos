<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\UsersModel;

class CustomersController extends BaseController
{
    public function index()
    {
        $users = new UsersModel();
        $datos = [
            'users' => $users->getCustomers()
        ];
        return view('admin/users/customers/index', $datos);
    }
    
    public function create()
    {
        return view('admin/users/customers/create');
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
            'password' => $password
        ];
        
        $users->insert($datos);

        return redirect()->route('customersList')->with('message', 'Registro creado exitosamente!');

    }

    public function edit($id)
    {
        $users = new UsersModel();
        $datos['users'] = $users->where('id',$id)->first();
        return view('admin/users/customers/edit', $datos);
    }

    public function update()
    {
        $validation = $this->validate([
            'name' => 'required|alpha_space',
            'surname' => 'required|alpha_space',
            'email' => 'required|valid_email|is_unique[users.email,id,{id}]',
            'password' => 'permit_empty|matches[c-password]'
        ]);
        if (! $validation) {
            return redirect()->back()->withInput()->with('msg', [
                'body' => 'Tienes campos incorrectos'
            ])
            ->with('errors', $this->validator->getErrors());
        }
        
        $users = new UsersModel();
        $datos = [
            'name' => $this->request->getVar('name'),
            'surname' => $this->request->getVar('surname'),
            'email' => $this->request->getVar('email')
        ];
        $id = $this->request->getVar('id');
        $users->update($id, $datos);

        if($password=$this->request->getVar('password')){
            $datos = [
                'password' => password_hash($password,PASSWORD_DEFAULT)
            ];
            $users->update($id, $datos);
        }

        return redirect()->route('customersList')->with('message', 'Registro actualizado exitosamente!');
    }

    public function delete($id)
    {
        $users = new UsersModel();
        $data_users = $users->where('id', $id)->first();
        $users->where('id', $id)->delete();
        return redirect()->route('customersList')->with('message', 'Registro eliminado exitosamente!');
    }

}
