<?php

namespace WbFbs;

use WbFbs\Entities\OrdersWbFbs;
use WbFbs\Entities\StocksWbFbs;
use WbFbs\Entities\SuppliesWbFbs;

class ClientWbFbs
{
    private OrdersWbFbs $ordersWbFbs;
    private StocksWbFbs $stocksWbFbs;
    private SuppliesWbFbs $suppliesWbFbs;

    public function __get(string $name)
    {
        return $this->$name;
    }

    public function __set(string $name, $value): void
    {
        $this->$name = $value;
    }
}