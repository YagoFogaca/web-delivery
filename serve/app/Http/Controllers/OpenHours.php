<?php

namespace App\Http\Controllers;

use App\Models\OpenHours as ModelOpenHours;
use Illuminate\Http\Request;
use Exception;

class OpenHours extends Controller
{

    public function update(Request $req)
    {
        $hours = $req->all();
        try {
            foreach ($hours['data'] as $hour) {
                $openHourModel = ModelOpenHours::where('day', $hour['day'])->update($hour);
                if (!$openHourModel) {
                    throw new Exception("O dia {$hour['day']} não foi possivel ser atualizado");
                }
            }
            return response()->json(["mensage" => "Horarios atualizados com suceso"], 200);
        } catch (Exception $error) {
            return response()->json(['mensage' => $error->getMessage()], 400);
        }
    }

    /**
     * Ativação/desativação propramatica
     */
    public function active(string $id)
    {
        //
    }
}
