<?php

namespace Application\UseCase\Shared\Interfaces;

interface TransactionInterface
{
    public function commit();
    public function rollback();
}
