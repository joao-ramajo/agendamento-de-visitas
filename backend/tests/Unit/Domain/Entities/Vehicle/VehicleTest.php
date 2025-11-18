<?php

use Domain\Entities\Vehicle;
use Domain\ValueObjects\Location;
use Domain\ValueObjects\Price;

describe('Vehicle entity', function () {
    it('cria uma entidade Vehicle com sucesso', function () {

        $location = new Location('Mogi das Cruzes', 'SP');

        $vehicle = new Vehicle(
            id: 1,
            imageUrl: 'http://test.png',
            brand: 'Volkswagen',
            model: 'Gol',
            version: '1.0',
            price: new Price(123000),
            location: $location
        );

        expect($vehicle)->toBeInstanceOf(Vehicle::class);
        expect($vehicle->id)->toBe(1);
        expect($vehicle->imageUrl)->toBe('http://test.png');
        expect($vehicle->brand)->toBe('Volkswagen');
        expect($vehicle->model)->toBe('Gol');
        expect($vehicle->version)->toBe('1.0');
        expect($vehicle->price)->toBeInstanceOf(Price::class);
        expect($vehicle->price->value())->toBe(123000);
        expect($vehicle->location)->toBeInstanceOf(Location::class);
        expect($vehicle->location->format())->toBe('Mogi das Cruzes - SP');
    });

    it('não aceita valor inválido no Price dentro do Vehicle', function () {
        new Vehicle(
            id: 1,
            imageUrl: 'http://test.png',
            brand: 'Volkswagen',
            model: 'Gol',
            version: '1.0',
            price: new Price(-1),  // aqui já lança
            location: new Location('Mogi das Cruzes', 'SP')
        );
    })->throws(InvalidArgumentException::class);
});
