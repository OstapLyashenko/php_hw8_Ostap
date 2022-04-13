<?php

namespace Hillel\Entities;

use Hillel\Casts\ArrayCast;
use Hillel\Casts\MoneyCast;
use Hillel\Casts\DateTimeCast;

class Product
{
    private float $price;

    private string $attributes;

    private int $updatedAt;

    protected $casts = [
        'price' => MoneyCast::class,
        'attributes' => ArrayCast::class,
        'updatedAt' => DateTimeCast::class,
    ];

    public function __construct($price, $attributes, $updatedAt)
    {
        $this->price = $price;
        $this->attributes = $attributes;
        $this->updatedAt = $updatedAt;
    }

    public function __set(string $variable, mixed $value)
    {
        $this->$variable;
    }

    public function __get($variable)
    {
        if (isset($this->$variable)) {
            return null;
        }
    }

    public function __toString(): string
    {   return  print_r($this->price, true);
        return print_r($this->attributes, true);
        return print_r($this->updatedAt, true);
    }
}
