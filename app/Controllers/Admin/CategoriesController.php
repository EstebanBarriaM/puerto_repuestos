<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\CategoriesModel;

class CategoriesController extends BaseController
{
    public function index()
    {
        $category = new CategoriesModel();
        $datos = [
            'category' => $category->getCategories()
        ];
        return view('admin/categories/index', $datos);
    }

    public function create()
    {
        return view('admin/categories/create');
    }

    public function save()
    {
        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'image' => [
                'uploaded[image]',
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,4098]',
            ]
        ]);

        if (! $validation) {
            return redirect()->back()->withInput()->with('msg', [
                'body' => 'Tienes campos incorrectos'
            ])
            ->with('errors', $this->validator->getErrors());
        }

        $category = new CategoriesModel();

        $image = $this->request->getFile('image');
        $nameRandom = $image->getRandomName();
        $image->move('../public/uploads/categories/', $nameRandom);
        $datos = [
            'name' => $this->request->getVar('name'),
            'image' =>  $nameRandom
        ];

        $category->insert($datos);
        
        return redirect()->route('categoriesList')->with('message', 'Registro creado exitosamente!');
    }

    public function edit($id)
    {
        $category = new CategoriesModel();
        $datos['category'] = $category->where('id',$id)->first();
             
        return view('admin/categories/edit', $datos);
    }

    public function update()
    {
        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'image' => [
                'mime_in[image,image/jpg,image/jpeg,image/png]',
                'max_size[image,4098]',
            ]
        ]);

        if (! $validation) {
            return redirect()->back()->withInput()->with('msg', [
                'body' => 'Tienes campos incorrectos'
            ])
            ->with('errors', $this->validator->getErrors());
        }

        $category = new CategoriesModel();
        $datos = [
            'name' => $this->request->getVar('name')
        ];
        $id = $this->request->getVar('id');
        $category->update($id, $datos);

        $image = $this->request->getFile('image');
        if ($image->getName()) {
            $data_category = $category->where('id',$id)->first();   
            $rute = ('../public/uploads/categories/'.$data_category['image']);
            unlink($rute);

            $nameRandom = $image->getRandomName();
            $image->move('../public/uploads/categories/', $nameRandom);

            $datos = ['image' =>  $nameRandom];
            $category->update($id,$datos);
        }

        return redirect()->route('categoriesList')->with('message', 'Registro actualizado exitosamente!');
    }

    public function delete($id)
    {
        $category = new CategoriesModel();
        $data_category = $category->where('id', $id)->first();
        $rute = ('../public/uploads/categories/'.$data_category['image']);
        unlink($rute);

        $category->where('id', $id)->delete();

        return redirect()->route('categoriesList')->with('message', 'Registro eliminado exitosamente!');
    }  
}
