<?php

namespace Application\UseCase\Product\DTO;

class DeleteProductInputDto
{
    public function __construct(
        public string $id
    ) {}
}
