<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\CurrencyRate;
use App\Managers\DatabaseManager;

class CurrencyDataRepository
{
    public function getAllRates(): array
    {
        $todaysRate = [];

        $ratesQuery = DatabaseManager::query()
            ->select('*')
            ->from('rates')
            ->execute();

        foreach ($ratesQuery as $rate) {
            $todaysRate[] = new CurrencyRate(
                (int) $rate['id'],
                $rate['currency'],
                $rate['rate']
            );
        }
        return $todaysRate;
    }
}
