<?php

namespace WbFbs\Entities;

use WbFbs\Abstracts\Entity;
use WbFbs\Library\WbFbs;

class SuppliesWbFbs extends Entity
{
    const PATH = 'supplies';

    public function __construct(
        private WbFbs $wbFbs
    ){}

    public function getSupplies(string $status, callable $callback = null): ?array
    {
        $this->response = $this->wbFbs->get(self::PATH,[
           'status' => $status
        ]);

        return $this->getResponse($callback);
    }
}