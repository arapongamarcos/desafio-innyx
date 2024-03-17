<?php

namespace Application\UseCase\Product\DTO;

class CreateProductOutputDto
{
    public function __construct(
        public array $options
    ) {}
}
