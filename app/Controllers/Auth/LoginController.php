<?php

namespace App\Controllers\Auth;
use App\Controllers\BaseController;
use App\Models\UsersModel;


class LoginController extends BaseController
{
    public function index()
    {
        if (!session()->is_logged)
        {
            return view('Auth/login');
        }

        return redirect()->route('homeAdmin');
    }

    public function login()
    {
        if(!$this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ])){
            return redirect()->back()->with('errors', $this->validator->getErrors())->withInput();
        }

        $email = trim($this->request->getVar('email'));
        $password = trim($this->request->getVar('password'));

        $model = model('UsersModel');

        if(!$user = $model->getUserBy('email', $email))
        {
            return redirect()->back()->with('msg', [
                'type' => 'danger',
                'body' => 'Este usuario no se encuentra registrado en el sistema'
            ]);
        }

        if (!password_verify($password, $user['password']))
        {
            return redirect()->back()->with('msg', [
                'type' => 'danger',
                'body' => 'Credenciales invalidas'
            ]);
        }

        session()->set([
            'id' => $user['id'],
            'full_name' => $user['name'] . ' ' . $user['surname'],
            'role' => $user['role'],
            'is_logged' => true
        ]);

        if ($user['role'] == 'Superadmin' || $user['role'] == 'Admin') {
            return redirect()->route('homeAdmin')->with('msg' , 'Bienvenido al panel de administracion!');
        } 

        return redirect()->route('homeCusomer')->with('msg' , 'Bienvenido!');
    }

    public function signout()
    {
        session()->destroy();
        return redirect()->route('homePage');
    }

        
}
