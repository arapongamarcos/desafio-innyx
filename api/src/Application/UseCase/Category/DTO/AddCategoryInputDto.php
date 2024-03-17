<?php

namespace Application\UseCase\Category\DTO;

class AddCategoryInputDto
{
    public function __construct(
        public string $name
    ) {}
}
