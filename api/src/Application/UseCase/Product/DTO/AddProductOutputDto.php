<?php

namespace Application\UseCase\Product\DTO;

class AddProductOutputDto
{
    public function __construct(
        public string $id
    ) {}
}
