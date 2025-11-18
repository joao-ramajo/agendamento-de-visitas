<?php

use Domain\ValueObjects\Price;

it('cria um objeto Price com sucesso', function (int $value) {
    $valor = $value;

    $price = new Price($valor);

    expect($price)->toBeInstanceOf(Price::class);
    expect($price->value())->toBe($valor);
})->with([
    123,
    8379173,
    111111,
    123910,
    10,
    1,
    0
]);

it('retorna o valor correto ao chamar value()', function (int $value) {
    $price = new Price($value);

    expect($price->value())->toBe($value);
})->with([
    24165616,
    00000001,
    10,
    0,
]);

it('lança exceção ao criar Price com valor negativo', function (int $value) {
    new Price($value);
})->throws(InvalidArgumentException::class)->with([-1, -1000]);