<?php

namespace Hillel\Entities;

use Hillel\Casts\ArrayCast;
use Hillel\Casts\MoneyCast;
use Hillel\Casts\DateTimeCast;
use phpDocumentor\Reflection\Types\Float_;

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
        if (isset($this->casts[$variable])) {
            $class = $this->casts[$variable];
            $method = 'set';
            return $class::$method($this->$variable);
        }
    }

    public function __get($variable)
    {
        if (isset($this->casts[$variable])) {
            $class = $this->casts[$variable];
            $method = 'get';
            return $class::$method($this->$variable);
        }
    }

    public function __toString(): string
    {
        return 'Price: ' . $this->price . "<br>"
            . 'Attributes: ' . print_r($this->attributes) . "<br>"
            . 'Time: ' . $this->updatedAt;
    }
}
