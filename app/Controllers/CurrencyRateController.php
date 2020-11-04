<?php

declare(strict_types=1);

namespace App\Controllers;


use App\Services\CurrencyRatePullService;

class CurrencyRateController
{
    public function index()
    {
        $currencyRate = new CurrencyRatePullService();
        $actualStats = $currencyRate->execute();
        
        return require_once __DIR__  . '/../Views/MainView.php';
    }
}
