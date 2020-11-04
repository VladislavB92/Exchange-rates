<?php

declare(strict_types=1);

namespace App\Models;

class CurrencyRate
{
    private int $id;
    private string $currency;
    private string $rate;

    public function __construct(
        int $id,
        string $currency,
        string $rate
    ) {
        $this->id = $id;
        $this->currency = $currency;
        $this->rate = $rate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getRate(): string
    {
        return $this->rate;
    }
}
