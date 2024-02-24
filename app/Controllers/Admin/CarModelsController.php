<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\CarModelsModel;
use App\Models\CarBrandsModel;

class CarModelsController extends BaseController
{
    public function index()
    {
        $carModels = new CarModelsModel();
        $datos = [
            'carModels' => $carModels->getCarModels()
        ];
        return view('admin/cars/models/index', $datos);
    }

    public function create()
    {
        $carBrands = new CarBrandsModel();
        $datos = [
            'carBrands' => $carBrands->getCarBrands()
        ];
        return view('admin/cars/models/create', $datos);
    }

    public function save()
    {
        $validation = $this->validate([
            'title' => 'required',
            'code' => 'required|min_length[2]'
        ]);
        if (! $validation) {
            return redirect()->back()->withInput()->with('msg', [
                'body' => 'Tienes campos incorrectos'
            ])
            ->with('errors', $this->validator->getErrors());
        }
        $carModels = new CarModelsModel();
        $datos = [
            'title' => $this->request->getVar('title'),
            'code' => $this->request->getVar('code'),
            'car_brand_id' => $this->request->getVar('car_brand_id')
        ];
        $carModels->insert($datos);
        return redirect()->route('carModelsList')->with('message', 'Registro creado exitosamente!');
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
        $carModels = model('CarModelsModel');
        $carModels->delete($id);

        return redirect()->route('carModelsList')->with('message', 'Registro eliminado exitosamente!');
    }  
}
