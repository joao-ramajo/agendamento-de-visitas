<?php declare(strict_types=1);

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;

class VehicleController
{
    public function index(Request $request)
    {
        $payload = [
            'message' => 'Listagem realizada com sucesso',
            'vehicles' => [
                [
                    'id' => 1,
                    'image_url' => 'http=> //image.png',
                    'brand' => 'Volkswagen',
                    'model' => 'Gol',
                    'version' => '1.0',
                    'price' => 123000,
                    'location' => 'Mogi das Cruzes'
                ]
            ]
        ];

        return Response::json($payload);
    }
}
