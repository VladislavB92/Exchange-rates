<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\CurrencyRateService;
use App\Services\CurrencyRatePullService;

class CurrencyRateController
{
    public function index()
    {
        $currencyRate = new CurrencyRateService();
        $actualStats = $currencyRate->execute();
        
        if (empty($actualStats)) {
            $this->pullData();
            return require_once __DIR__  . '/../Views/MainView.php';
        }
        return require_once __DIR__  . '/../Views/MainView.php';
    }

    public function pullData()
    {
        $currencyDataPull = new CurrencyRatePullService();
        $currencyDataPull->execute();
    }
}
