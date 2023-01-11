<?php

namespace WbFbs\Entities;

use WbFbs\Abstracts\Entity;
use WbFbs\Library\WbFbs;

class StocksWbFbs extends Entity
{
    const PATH = 'stocks';

    public function __construct(
        private WbFbs $wbFbs
    ){}

    public function getStocks(int $skip = 0, int $take = 250 ,string $search = '',callable $callback = null): ?array
    {
        $this->response = $this->wbFbs->get(self::PATH,[
            'skip' => $skip,
            'take' => $take,
            'search' => $search
        ]);

        return $this->getResponse($callback);
    }
}