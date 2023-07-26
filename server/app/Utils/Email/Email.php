<?php

namespace App\Utils\Email;

use App\Mail\Verification;
use Illuminate\Support\Facades\Mail;

class Email
{
  public static $code_config = [
    'min' => 1000,
    'max' => 9999
  ];

  public static $cod;

  public static function generateCode()
  {
    return random_int(self::$code_config['min'], self::$code_config['max']);
  }

  public static function emailSending(array $data)
  {
    self::$cod = self::generateCode();
    Mail::to($data['email'])->send(new Verification([
      'code' => self::$cod,
      'nome' => $data['nome']
    ]));

    return self::$cod;
  }
}
