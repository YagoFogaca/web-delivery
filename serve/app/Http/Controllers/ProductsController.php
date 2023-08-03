<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Utils\Image\Image;
use Exception;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function create(Request $req)
    {
        $req->validate(
            [
                'name' => 'required|unique:products',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required|image',
                'category' => 'required'
            ],
            [
                'name' => 'Nome inválido',
                'price' => 'Preço inválido',
                'description' => 'Descrição inválida',
                'image' => 'Imagem inválida',
                'category' => 'Categoria inválida'
            ]
        );

        try {
            $product = $req->all();
            $product = [
                'name' => strtolower($req->input('name')),
                'prince' => $req->input('price'),
                'description' => strtolower($req->input('description')),
                'image' => $req->image,
                'category_id' => intval($req->input('category'))
            ];
            $product['image'] = Image::saveImage($product['name'], $req);
            // dd($product);
            $modelProducts = Products::create($product);
            if (!$modelProducts) {
                throw new Exception('Ocorreu um erro ao criar o produto');
            }
            dd($modelProducts);
        } catch (Exception $error) {
            dd($error->getMessage());
        }
    }
}
