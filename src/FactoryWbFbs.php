<?php

namespace WbFbs;

use WbFbs\Entities\OrdersWbFbs;
use WbFbs\Entities\StocksWbFbs;
use WbFbs\Entities\SuppliesWbFbs;
use WbFbs\Library\WbFbs;

class FactoryWbFbs
{
    const ENTITIES = [
      'ordersWbFbs' => OrdersWbFbs::class,
      'stocksWbFbs' => StocksWbFbs::class,
      'suppliesWbFbs' => SuppliesWbFbs::class
    ];

    private static function initWbFbs($auth_key): WbFbs
    {
        $http = new \GuzzleHttp\Client([
            'base_uri' => "https://suppliers-api.wildberries.ru/api/v2/",
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ]
        ]);
        $wbFbs = new WbFbs($http);
        $wbFbs->setAuth($auth_key);
        return $wbFbs;
    }

    public static function init(string $auth_key, ?array $entities = null): ClientWbFbs{
        $wbFbs = self::initWbFbs($auth_key);
        $client = new ClientWbFbs();

        $init_list = is_null($entities) ? array_keys(self::ENTITIES) : $entities;

        foreach ($init_list as $entity){
            $class = self::ENTITIES[$entity];
            $client->$entity = new $class($wbFbs);
        }

        return $client;
    }
}