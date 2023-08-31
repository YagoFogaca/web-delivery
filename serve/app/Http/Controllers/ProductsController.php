<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Utils\Image\Image;
use Exception;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $categories = Category::with('products')->get(['*']);
        $products = Products::with('category')->get(['*'])->toArray();
        return view('pages.platform-products.index', ['categories' => $categories, 'products' => $products]);
    }

    public function store()
    {
        $categories = Category::with('products')->get(['*']);
        return view('pages.create-products.index', ['categories' => $categories]);
    }

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
            $product = [
                'name' => $req->input('name'),
                'prince' => $req->input('price'),
                'description' => $req->input('description'),
                'image' => $req->image,
                'category_id' => intval($req->input('category'))
            ];
            $product['image'] = Image::save(strtolower($product['name']), $req);
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

    public function edit(Products $product)
    {
        $categories = Category::with('products')->get();
        return view('pages.edit-products.index', ['product' => $product->toArray(), 'categories' => $categories]);
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

    public function active(Products $product, Request $req)
    {
        try {
            $productActive = $req->all();
            $productAcitveUpdated = $product->update(['active' => $productActive['active']]);
            if (!$productAcitveUpdated) {
                throw new Exception('Erro ao ativar/devativar o produto');
            }
            return response()->json($product, 200);
        } catch (Exception $error) {
            return response()->json(['mensage' => $error->getMessage(), 'status_code' => 404], 404);
        }
    }
}
