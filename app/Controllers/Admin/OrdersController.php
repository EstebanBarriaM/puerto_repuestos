<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class OrdersController extends BaseController
{
    public function index()
    {
        return view('admin/orders/index');
    }
}
