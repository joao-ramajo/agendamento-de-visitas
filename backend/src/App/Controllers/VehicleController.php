<?php declare(strict_types=1);

namespace App\Controllers;

use App\Http\Request;
use App\Http\Response;
use Domain\Entities\Vehicle;
use Domain\ValueObjects\Location;
use Domain\ValueObjects\Price;

class VehicleController
{
    public function index(Request $request)
    {
        $vehicles = [
            new Vehicle(
                id: 1,
                imageUrl: 'https://cdn.site.com/cars/gol.png',
                brand: 'Volkswagen',
                model: 'Gol',
                version: '1.0 MSI',
                price: new Price(55000),
                location: new Location('Carapicuíba', 'SP')
            ),
            new Vehicle(
                id: 2,
                imageUrl: 'https://cdn.site.com/cars/argo.png',
                brand: 'Fiat',
                model: 'Argo',
                version: '1.3 Trekking',
                price: new Price(72000),
                location: new Location('Osasco', 'SP')
            ),
            new Vehicle(
                id: 3,
                imageUrl: 'https://cdn.site.com/cars/corolla.png',
                brand: 'Toyota',
                model: 'Corolla',
                version: 'Altis 2.0',
                price: new Price(135000),
                location: new Location('São Paulo', 'SP')
            ),
            new Vehicle(
                id: 4,
                imageUrl: 'https://cdn.site.com/cars/hb20.png',
                brand: 'Hyundai',
                model: 'HB20',
                version: 'Comfort 1.0',
                price: new Price(68000),
                location: new Location('Guarulhos', 'SP')
            ),
            new Vehicle(
                id: 5,
                imageUrl: 'https://cdn.site.com/cars/kicks.png',
                brand: 'Nissan',
                model: 'Kicks',
                version: 'Advance CVT',
                price: new Price(112000),
                location: new Location('Barueri', 'SP')
            ),
        ];

        return Response::json([
            'message' => 'Listagem realizada com sucesso',
            'vehicles' => $vehicles,
        ]);
    }
}
