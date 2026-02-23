<?php

namespace NanoDepo\Nexus\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use InvalidArgumentException;
use Stringable;

final readonly class Price implements Stringable, Jsonable, Arrayable
{
    private string $currency;
    public function __construct(
        private int|float $value,
        ?string $currency
    ) {
        if ($currency === null) {
            $this->currency = array_key_first(config('nexus.currencies'));
        } else {
            $this->currency = $currency;
        }

        if (!isset(config('nexus.currencies')[$this->currency])) {
            throw  new InvalidArgumentException('Currency not allowed');
        }
    }

    public function raw(): int|float
    {
        return $this->value * config('nexus.precision');
    }

    public function value(): float|int
    {
        return $this->value;
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function symbol(): string
    {
        return config('nexus.currencies')[$this->currency];
    }

    public function formatted(): string
    {
        return number_format($this->value(), config('nexus.decimals'), ',', ' ') . ' ' . $this->symbol();
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }

    public function toJson($options = 0): string
    {
        return (string) $this->value();
    }

    public function toArray(): string
    {
        return (string) $this->value();
    }
}
