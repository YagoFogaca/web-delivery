<?php

namespace App\Utils\Image;

use Exception;
use Illuminate\Support\Facades\Storage;

class Image
{
  public static function save($name, $req)
  {
    $name_verify = str_replace(' ', '-', $name);
    $extension = $req->image->getClientOriginalExtension();
    return $req->image->storeAs('products', $name_verify . ".{$extension}");
  }

  public static function delete(string $name)
  {
    $imageDeleted = Storage::delete($name);
    if (!$imageDeleted) {
      throw new Exception('Ocorreu um erro ao deletar a imagem do produto');
    }

    return $imageDeleted;
  }

  public static function update(string $path, string $name, $req)
  {
    // string $path nome a imagem já salva 
    // string $name nome do produto para salvar a imagem
    // $req requisição
    self::delete($path);
    return self::save($name, $req);
  }
}
