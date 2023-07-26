<?php

namespace App\Http\Controllers;

use App\Models\EmailVerification;
use App\Models\Store;
use App\Utils\Email\Email;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    public function verification()
    {
        return view('pages.verification');
    }

    public function check(Request $req)
    {

        $req->validate(
            [
                'cod' => 'required|min:4|max:4'
            ],
            [
                'cod' => 'O código informado é invalido'
            ]
        );
        $id = Auth::guard('store')->id();
        $data = EmailVerification::where('id_referencia', $id)->first();
        $cod = $req->input('cod');
        $store = Store::find($id);

        $horaCodigo = Carbon::parse($data['created_at'])->timestamp;
        $horaAtual = Carbon::now()->timestamp;
        $horaExpiracao = $horaCodigo + (15 * 60);

        if ($horaAtual > $horaExpiracao) {
            $data->delete();
            // deve ser mandado outro cod email
            // Mandar email e nome da loja
            $code = Email::emailSending($store->toArray());
            EmailVerification::create(['id_referencia' => $id, 'cod' => $code]);

            return redirect()->back()->withErrors(['cod' => 'Código expirado']);
        }

        if ($data['cod'] !== $cod) {
            return redirect()->back()->withErrors(['cod' => 'Código invalido']);
        }

        $store['email_verificado'] = 1;
        $store->update($store->toArray());
        $data->delete();

        dd('funfou');
    }
}
