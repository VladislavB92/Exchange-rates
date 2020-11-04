<?php

declare(strict_types=1);

namespace App\Services;

use App\Managers\DatabaseManager;
use App\Models\CurrencyRate;

class CurrencyRateService
{
    public function execute(): array
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
