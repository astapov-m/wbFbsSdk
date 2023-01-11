<?php

namespace WbFbs\Abstracts;

abstract class Entity
{
    protected array $response;

    protected function runCallBack(callable $callback = null): void
    {
        if(!is_null($callback)) {
            $callback($this->response);
        }
    }

    protected function getResponse(callable $callback = null): ?array
    {
        static::runCallBack($callback);
        return $this->response ?? null;
    }
}