<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\CurrencyDataRepository;
use App\Managers\DatabaseManager;
use App\Managers\XmlManager;

class CurrencyRatePullService
{
    private CurrencyDataRepository $currencyDataRepository;

    public function __construct()
    {
        $this->currencyDataRepository = new CurrencyDataRepository();
    }

    public function execute()
    {
        $data = (new XmlManager())->result();

        foreach ($data[1]['value'] as $currencyData) {
            $currencyValues[] = [$currencyData['value'][0]['value'], $currencyData['value'][1]['value']];
        }

        foreach ($currencyValues as $rate) {
            DatabaseManager::query()
                ->insert('rates')
                ->values([
                    'currency' => ':currency',
                    'rate' => ':rate'
                ])
                ->setParameters([
                    'currency' => $rate[0],
                    'rate' => $rate[1]
                ])
                ->execute();
        }

        return $this->currencyDataRepository->getAllRates();
    }
}
