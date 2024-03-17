<?php

namespace Application\UseCase\Product\DTO;

class ListProductInputDto
{
    public function __construct(
        public ?array $filters
    ) {}
}
