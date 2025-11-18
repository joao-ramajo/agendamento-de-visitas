<?php declare(strict_types=1);

namespace Domain\ValueObjects;

use InvalidArgumentException;

class Location
{
    public function __construct(
        public readonly string $city,
        public readonly string $uf,
    ) {
        if (!preg_match('/^[A-Z]{2}$/', strtoupper($uf))) {
            throw new InvalidArgumentException('Invalid UF');
        }

        if (trim($city) === '') {
            throw new InvalidArgumentException('City cant be null');
        }
    }

    public function format(): string
    {
        return "$this->city - $this->uf";
    }

    public function __toString(): string
    {
        return $this->format();
    }
}
