<?php

namespace Application\UseCase\Product\DTO;

class FindProductInputDto
{
    public function __construct(
        public string $id
    ) {}
}
