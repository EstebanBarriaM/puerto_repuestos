<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\CategoriesModel;
use App\Models\ProductImagesModel;
use App\Models\InventoryModel;
use App\Models\ProductsModel;

class ProductsController extends BaseController
{
    public function index()
    {
        $productModel = new ProductsModel();
        $products = [];

        // iteramos todos los productos y le agregamos la foto (porque tiene varias fotos)
        foreach ($productModel->getProducts() as $product) {
            $images = $productModel->getImages($product->id);
            // creamos propiedad "image"
            $product->image = (count($images)) ? $images[0]->name : '';
            
            $products[] = $product;
        }

        $datos = [
            'products' => $products
        ];
        
        return view('admin/products/index', $datos);
    }
        
    public function create()
    {
        $categories = new CategoriesModel();
        $datos = [
            'categories' => $categories->getCategories()
        ];
        return view('admin/products/create', $datos);
    }
    
    public function save()
    {
        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        if (! $validation) {
            return redirect()->back()->withInput()->with('msg', [
                'body' => 'Tienes campos incorrectos'
            ])
            ->with('errors', $this->validator->getErrors());
        }

        // crear inventario
        $inventory = new InventoryModel();
        $dato_cantidad = [
            'quantity' =>  $this->request->getVar('quantity')
        ];
        $inventory->insert($dato_cantidad);

        // crear producto
        $products = new ProductsModel();
        $dato = [
            'name' =>  $this->request->getVar('name'),
            'description' =>  $this->request->getVar('description'),
            'price' =>  $this->request->getVar('price'),
            'inventory_id' => $inventory->getInsertID(),
            'category_id' =>  $this->request->getVar('category_id')
        ];
        $products->insert($dato);

        // subir imagenes
        $images = $this->request->getFileMultiple('images');
        foreach($images as $image) {   
            $productImage = new ProductImagesModel();

            // movemos imagen
            $nameRandom = $image->getRandomName();
            $image->move('../public/uploads/products/', $nameRandom);

            // crear carpeta con nombre ID producto
            // $image->move('../public/uploads/products/' . $products->getInsertID() . '/', $nameRandom);

            // guardamos imagen
            $datos = [
                'name' => $nameRandom,
                'product_id' =>  $products->getInsertID()
            ];

            $productImage->insert($datos);
        }

        return redirect()->route('productsList')->with('message', 'Registro creado exitosamente!');
    }

    public function edit($id)
    {
        $product = new ProductsModel();
        $inventory = new InventoryModel();
        $categories = new CategoriesModel();

        $datos = [
            'product' => $product->where('id', $id)->first(),
            'inventory' => $inventory->where('id', $product->where('id', $id)->first()['inventory_id'])->first(),
            'categories' => $categories->getCategories()
        ];
             
        return view('admin/products/edit', $datos);
    }

    public function update()
    {
        $validation = $this->validate([
            'name' => 'required|min_length[3]',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        if (! $validation) {
            return redirect()->back()->withInput()->with('msg', [
                'body' => 'Tienes campos incorrectos'
            ])
            ->with('errors', $this->validator->getErrors());
        }

        // update product
        $product = new ProductsModel();
        $datos = [
            'category_id' => $this->request->getVar('category_id'),
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'price' => $this->request->getVar('price')
        ];
        $id = $this->request->getVar('id');
        $product->update($id, $datos);

        // update inventory
        $inventory = new InventoryModel();
        $datosInventory = [
            'quantity' => $this->request->getVar('quantity')
        ];
        $inventory_id = $this->request->getVar('inventory_id');
        $inventory->update($inventory_id, $datosInventory);

        return redirect()->route('productsList')->with('message', 'Registro actualizado exitosamente!');
    }

    public function delete($id)
    {
        $product = new ProductsModel();
        $data_product = $product->where('id', $id)->first();
        $inventory = new InventoryModel();

        foreach ($product->getImages($id) as $image) {
            $rute = ('../public/uploads/products/'.$image->name);
            unlink($rute);

            $productImage = new ProductImagesModel();
            $productImage->where('id', $image->id)->delete();
        }

        $inventory->where('id', $data_product['inventory_id'])->delete();
        $product->where('id', $id)->delete();

        return redirect()->route('productsList')->with('message', 'Registro eliminado exitosamente!');
    } 
}
