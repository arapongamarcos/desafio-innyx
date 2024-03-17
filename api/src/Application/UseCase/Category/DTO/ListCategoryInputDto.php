<?php

namespace Application\UseCase\Category\DTO;

class ListCategoryInputDto
{
    public function __construct(
        public ?array $filters
    ) {}
}
