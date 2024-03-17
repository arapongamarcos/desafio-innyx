<?php

namespace Application\UseCase\Product\DTO;

class DeleteProductOutputDto
{
    public function __construct(
        public bool $deleted
    ) {}
}
