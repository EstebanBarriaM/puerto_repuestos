<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use Config\Database;

class HomeController extends BaseController
{
    public function index()
    {
        $datos = [
            'customersCount' => $this->customersCount()[0]->count,
            'productsCount' => $this->productsCount()[0]->count
        ];

        return view('admin/index', $datos);
    }
       
    private function customersCount()
    {
        $db = Database::connect();
        $builder = $db->table('users');
        $builder->select('count(*) as count');
        $builder->where('users.deleted_at', null);
        $builder->where('users.role', 'Customer');
        $query = $builder->get();
        
        return $query->getResult();
    }

    private function productsCount()
    {
        $db = Database::connect();
        $builder = $db->table('products');
        $builder->select('count(*) as count');
        $builder->where('products.deleted_at', null);
        $query = $builder->get();
        
        return $query->getResult();
    }
}
