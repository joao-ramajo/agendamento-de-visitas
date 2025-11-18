<?php declare(strict_types=1);

namespace Domain\ValueObjects;

use InvalidArgumentException;

class Price
{
    public function __construct(
        public readonly int $value
    ) {
        if ($value < 0) {
            throw new InvalidArgumentException('Price cannot be negative.');
        }
    }

    public function value(): int
    {
        return $this->value;
    }
}
