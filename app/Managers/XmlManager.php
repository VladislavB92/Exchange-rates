<?php

declare(strict_types=1);

namespace App\Managers;

use Sabre\Xml\Service;

class XmlManager
{
    private $xml;
    private Service $service;

    public function __construct()
    {
        $this->xml = file_get_contents('https://www.bank.lv/vk/ecb.xml');
        $this->service = new Service();
    }

    public function mapSource(): void
    {
        $this->service->elementMap = [
            'Currency' => 'Sabre\Xml\Deserializer\keyValue'
        ];
    }

    public function result(): array
    {
        $result = $this->service->parse($this->xml);

        return $result;
    }
}
