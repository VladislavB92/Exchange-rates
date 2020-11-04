<?php

declare(strict_types=1);

namespace App\Services;

use App\Managers\DatabaseManager;
use App\Managers\XmlManager;

class CurrencyRatePullService
{
    public function execute()
    {
        $data = (new XmlManager('https://www.bank.lv/vk/ecb.xml'))->result();

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
    }
}
