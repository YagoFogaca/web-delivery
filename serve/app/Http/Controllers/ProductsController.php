<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Utils\Image\Image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $product['image'] = Image::save($product['name'], $req);
            $modelProducts = Products::create($product);
            if (!$modelProducts) {
                throw new Exception('Ocorreu um erro ao criar o produto');
            }
            return redirect()->back()->with('products', 'Produto criado com sucesso');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['products', 'Ocorreu um erro ao criar o produto']);
        }
    }

    public function delete(string $id)
    {
        try {
            $product = Products::find($id);
            $productDeleted = $product->delete();
            Image::delete($product->toArray()['image']);
            if (!$productDeleted) {
                throw new Exception('Ocorreu um erro ao deletar o produto');
            }
            return redirect()->back();
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['products', 'Ocorreu um erro ao deletar o produto']);
        }
    }

    public function update(Products $product, Request $req)
    {

        $req->validate(
            [
                'name' => 'unique:products,id,' . $product['id'],
                'description' => 'min:2',
                'prince' => 'numeric|min:0,01',
                'image' => 'image',
                'category' => 'required'
            ],
            [
                'name' => ['unique' => 'Esse nome já está em uso'],
                'description' => 'Descrição inválida',
                'prince' => 'numeric|min:0,01',
                'image' => 'Imagem inválida',
                'category' => 'Categoria é obrigatoria'
            ]
        );
        try {
            $newProducts = $req->all();
            $newProducts['name'] = strtolower($newProducts['name']);
            if ($req->image) {
                $product['image'] = Image::update($product['image'], $newProducts['name'], $req);
            }
            $productUpdate =  $product->update($req->all());
            if (!$productUpdate) {
                throw new Exception('Ocorreu um erro ao atualizar o produto');
            }
            return redirect()->back();
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['products', $error->getMessage()]);
        }
    }
}
