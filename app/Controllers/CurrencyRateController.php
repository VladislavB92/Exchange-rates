<?php

declare(strict_types=1);

namespace App\Controllers;


use App\Services\CurrencyRateService;

class CurrencyRateController
{
    public function index()
    {
        $currencyRate = new CurrencyRateService();
        $actualStats = $currencyRate->execute();
        
        return require_once __DIR__  . '/../Views/MainView.php';
    }
}
