<?php

namespace NanoDepo\Nexus\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PriceCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): int|float
    {
        return $value === 0 ? 0 : $value / config('nexus.precision');
    }

    public function set($model, string $key, $value, array $attributes): int|float
    {
        return $value === 0 ? 0 : $value * config('nexus.precision');
    }
}
