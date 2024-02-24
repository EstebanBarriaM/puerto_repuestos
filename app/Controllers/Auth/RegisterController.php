<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Entities\UsersEntities;
use App\Models\UsersModel;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('auth/register');
    }

    public function store()
    {
        $validation = service('validation');
        $validation->setRules([
            'name' => 'required|alpha_space',
            'surname' => 'required|alpha_space',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|matches[c-password]'
        ]);

        if (!$validation->withRequest($this->request)->run())
        {
            //dd($validation->getErrors());
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
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
        return redirect()->route('homePage');
    }

}