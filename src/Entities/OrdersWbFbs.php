<?php

namespace WbFbs\Entities;

use WbFbs\Abstracts\Entity;
use WbFbs\Library\WbFbs;

class OrdersWbFbs extends Entity
{
    const PATH = 'orders';

    public function __construct(
        private WbFbs $wbFbs
    ){}

    public function getOrders(string $date_start, int $skip = 0, int $take = 250 , string $date_end = '',callable $callback = null): ?array
    {
        $this->response = $this->wbFbs->get(self::PATH,[
            'skip' => $skip,
            'take' => $take,
            'date_start' => $date_start,
            'date_end' => $date_end
        ]);

        return $this->getResponse($callback);
    }

    public function getOrdersByStatus(string $date_start,int $status,int $skip = 0, int $take = 250 , string $date_end = '',callable $callback = null): ?array
    {
        $this->response = $this->wbFbs->get(self::PATH,[
            'skip' => $skip,
            'take' => $take,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'status' => $status
        ]);

        return $this->getResponse($callback);
    }

    public function getOrdersById(string $date_start,int $id,int $skip = 0, int $take = 250 , string $date_end = '',callable $callback = null): ?array
    {
        $this->response = $this->wbFbs->get(self::PATH,[
            'skip' => $skip,
            'take' => $take,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'id' => $id
        ]);

        return $this->getResponse($callback);
    }
}